<?php
namespace CodeMonitoring\Framework\Import\Importer;

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

use CodeMonitoring\Framework\Import;
use TYPO3\Flow\Resource\Resource;

/**
 * Default importer to import all parsed information without modifications to
 * database.
 */
class DefaultImporter extends Import\AbstractImporter
{
    public function canHandle(Resource $file)
    {
        if (! $this->canHandleFileExtension($file)) {
            return false;
        }

        if (! $this->canHandleFileByContent($file)) {
            return false;
        }

        return true;
    }

    /**
     * @TODO: Implement via EEL and configuration.
     */
    protected function canHandleFileExtension(Resource $file)
    {
        if ($file->getFileExtension() !== 'xml') {
            return false;
        }

        return true;
    }

    /**
     * @TODO: Implement via EEL and configuration.
     */
    protected function canHandleFileByContent(Resource $file)
    {
        $content = $file->getStream();
        // Skip first line containing xml doc.
        fgets($content);
        // Get interesting lines.
        $secondLine = fgets($content);
        fclose($content);

        // Check lines.
        if (strpos($secondLine, 'checkstyle') !== false) {
            return true;
        }

        return false;
    }

    public function import()
    {
        \TYPO3\Flow\var_dump($this->parser, '$this->parser');die;
    }
}
