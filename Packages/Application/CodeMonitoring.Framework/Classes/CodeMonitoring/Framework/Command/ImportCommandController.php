<?php
namespace CodeMonitoring\Framework\Command;

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
use TYPO3\Flow\Cli\CommandController;
use CodeMonitoring\Framework\Import\ImporterFactory;

/**
 * Provides CLI access to import all registered formats into the system.
 */
class ImportCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var \TYPO3\Flow\Resource\ResourceManager
     */
    protected $resourceManager;

    /**
     * @var ImporterFactory
     * @Flow\Inject
     */
    protected $importerFactory;

    /**
     * Import the given files.
     *
     * @param array $files
     *
     * @return void
     */
    public function importFilesCommand(array $files)
    {
        foreach ($files as $filePath) {
            // TODO: Persist file for logging?  Everyone can take a look what
            // was imported, and when.  Also GUI can display raw reports.
            // Implement as feature, configurable, another package, aop, ... ?
            $file = $this->resourceManager->importResource($filePath);

            $parser = $this->importerFactory->getImporterForFile($filePath);
            $parser->import
        }
        // Importer will use a parser to get content of file in needed format.
        // Importer will import
    }
}
