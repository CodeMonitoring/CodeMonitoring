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

/**
 * Defines how an object will tell the world his priority.
 *
 * Often used to determine the order in which objects should be tried.
 * E.g. which parser should be used first, before trying next one.
 */
interface PriorityInterface
{
    /**
     * Define priority of the parser.
     *
     * If multiple parser can handle the same file, the parser with higher
     * priority will be used.
     *
     * @return int
     */
    public function getPriority();
}
