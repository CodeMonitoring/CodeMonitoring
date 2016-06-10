<?php
namespace CodeMonitoring\Framework\Import;

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

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Resource\Resource;
use CodeMonitoring\Framework\Parse;

/**
 * Factory to return Importer.
 *
 * @Flow\Scope("singleton")
 */
class ImporterFactory
{

    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\Reflection\ReflectionService
     */
    protected $reflectionService;

    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\Object\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * Determines parser for given file.
     *
     * @param Resource $file File to get importer for.
     *
     * @return ParserInterface
     */
    public function getImporterForFile(Resource $file)
    {
        foreach ($this->getPossibleParsers() as $parser) {
            if ($parser->canParse($file)) {
                return $parser;
            }
        }

        throw new Parse\ParserException(
            'No parser found that can handle "' . $filePath . '".',
            Parse\ParserException::NO_PARSER_FOUND
        );
    }

    /**
     * Get all possible parsers, sorted by priority.
     *
     * Instances of the parsers will be returned.
     *
     * @return array
     */
    protected function getPossibleParsers()
    {
        $parser = [];
        $parserClassNames = $this->reflectionService->getAllImplementationClassNamesForInterface(
            Parse\ParserInterface::class
        );

        foreach ($parserClassNames as $className) {
            $parser[] = $this->objectManager->get($className);
        }

        usort(
            $parser,
            function (Parse\ParserInterface $parserA, Parse\ParserInterface $parserB) {
                \TYPO3\Flow\var_dump($parserA->getPriority(), '$parserA->getPriority()');
                \TYPO3\Flow\var_dump($parserB->getPriority(), '$parserB->getPriority()');
                if ($parserA->getPriority() === $parserB->getPriority()) {
                    return 0;
                }
                return ($parserA->getPriority() < $parserB->getPriority()) ? 1 : -1;
            }
        );

        return $parser;
    }
}
