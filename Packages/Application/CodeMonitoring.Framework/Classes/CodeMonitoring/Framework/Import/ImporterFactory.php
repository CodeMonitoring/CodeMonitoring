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

use CodeMonitoring\Framework\Importer;
use CodeMonitoring\Framework\Parse;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Resource\Resource;

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
        $importer = $this->getImporter($file);
        $importer->setParser($this->getParser($file));

        return $importer;
    }

    protected function getImporter(Resource $file)
    {
        foreach ($this->getPossibleImporter() as $importer) {
            if ($importer->canHandle($file)) {
                return $importer;
            }
        }

        throw new ImporterException(
            'No importer found for file',
            ImporterException::NO_IMPORTER_FOUND
        );
    }

    /**
     * Get all possible importer, sorted by priority.
     *
     * Instances of the importer will be returned.
     *
     * @return array
     */
    protected function getPossibleImporter()
    {
        $importer = [];
        $importerClassNames = $this->reflectionService->getAllImplementationClassNamesForInterface(
            ImporterInterface::class
        );

        foreach ($importerClassNames as $className) {
            $importer[] = $this->objectManager->get($className);
        }

        usort(
            $importer,
            function (ImporterInterface $importerA, ImporterInterface $importerB) {
                if ($importerA->getPriority() === $importerB->getPriority()) {
                    return 0;
                }
                return ($importerA->getPriority() < $importerB->getPriority()) ? 1 : -1;
            }
        );

        return $importer;
    }

    protected function getParser(Resource $file)
    {
        foreach ($this->getPossibleParsers() as $parser) {
            if ($parser->canHandle($file)) {
                $parser->setFileToParse($file);
                return $parser;
            }
        }

        throw new Parse\ParserException(
            'No parser found for file.',
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
                if ($parserA->getPriority() === $parserB->getPriority()) {
                    return 0;
                }
                return ($parserA->getPriority() < $parserB->getPriority()) ? 1 : -1;
            }
        );

        return $parser;
    }
}
