<?php
namespace CodeMonitoring\Framework\Feature;

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
 * Defines how an object will tell the world whether it can work with a given
 * file.
 */
interface CanHandleFileInterface
{
    /**
     * Defines whether this class can work with the given file.
     *
     * Return true if the object can work with file, false otherwise.
     *
     * @param Resource $file
     *
     * @return bool
     */
    public function canHandle(Resource $file);
}
