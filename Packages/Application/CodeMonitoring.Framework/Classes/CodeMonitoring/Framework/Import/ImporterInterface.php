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

use CodeMonitoring\Framework\Feature\CanHandleFileInterface;
use CodeMonitoring\Framework\Feature\PriorityInterface;
use CodeMonitoring\Framework\Parse\ParserInterface;

/**
 * All importer have to implement this interface.
 *
 * By implementing the interface, they will be registered to the factory.
 */
interface ImporterInterface extends CanHandleFileInterface, PriorityInterface
{
    /**
     * Defines whether importer can handle the given file.
     *
     * @param ParserInterface $parser
     *
     * @return void
     */
    public function setParser(ParserInterface $parser);

    /**
     * Implement import logic.
     *
     * @return void
     */
    public function import();
}
