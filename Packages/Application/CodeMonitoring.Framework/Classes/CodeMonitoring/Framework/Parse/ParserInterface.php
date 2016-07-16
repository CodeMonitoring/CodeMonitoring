<?php
namespace CodeMonitoring\Framework\Parse;

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

use TYPO3\Flow\Resource\Resource;

/**
 * All parser have to implement this interface.
 *
 * By implementing the interface, they will be registered to the factory.
 */
interface ParserInterface
{
    /**
     * Defines whether parser can parse the given file.
     *
     * It's up to the parser to determine that.
     *
     * @param Resource $file
     *
     * @return bool
     */
    public function canHandle(Resource $file);

    /**
     * Define priority of the parser.
     *
     * If multiple parser can handle the same file, the parser with higher
     * priority will be used.
     *
     * @return int
     */
    public function getPriority();

    public function getData();

    public function setFileToParse(Resource $file);
}
