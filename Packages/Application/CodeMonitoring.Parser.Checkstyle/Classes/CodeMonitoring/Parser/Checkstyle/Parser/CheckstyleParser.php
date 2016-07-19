<?php
namespace CodeMonitoring\Parser\Checkstyle\Parser;

/*
 * Copyright (C) 2016  Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

use CodeMonitoring\Framework\Feature\PriorityTrait;
use CodeMonitoring\Framework\Parse\EelParsingDetectionTrait;
use CodeMonitoring\Framework\Parse\ParserInterface;
use CodeMonitoring\Parser\Checkstyle\Domain\Model\MessageDto;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Resource\Resource;

/**
 * Parser for checkstyle format.
 */
class CheckstyleParser implements ParserInterface
{
    use EelParsingDetectionTrait;
    use PriorityTrait;

    /**
     * Defines XML name for files.
     * @var string
     */
    protected $nodeNameForFiles = 'file';

    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\Property\PropertyMapper
     */
    protected $propertyMapper;

    /**
     * @var Resource
     */
    protected $fileToParse;

    // TODO: As all parser will use this, move to abstract parser?
    public function setFileToParse(Resource $file)
    {
        $this->fileToParse = $file;
    }

    public function getData()
    {
        $file = [];
        $reader = new \XMLReader;
        $reader->open($this->fileToParse->createTemporaryLocalCopy());

        while ($reader->read() && $reader->name !== $this->nodeNameForFiles) {
            // Nothing todo, just move to the first file
        }

        // Parse each file.
        while ($reader->name === $this->nodeNameForFiles) {
            $xmlNodeFile = new \SimpleXMLElement($reader->readOuterXML());
            $file = [
                'fileName' => ((array) $xmlNodeFile->attributes())['@attributes']['name']
            ];

            // Parse each message for file.
            foreach ($xmlNodeFile->children() as $xmlNodeMessage) {
                yield $this->propertyMapper->convert(
                    array_merge(
                        $file,
                        ((array) $xmlNodeMessage->attributes())['@attributes']
                    ),
                    MessageDto::class
                );
            }

            $reader->next($this->nodeNameForFiles);
        }

        $reader->close();
    }
}
