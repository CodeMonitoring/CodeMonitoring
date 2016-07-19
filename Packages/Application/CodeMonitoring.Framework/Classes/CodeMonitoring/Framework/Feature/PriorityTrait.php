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
 * Trait to implement PriorityInterface.
 *
 * This enables developers to attach it, and just configure via Objects.yaml.
 *
 * No need for additional code and custom implementation if not needed.
 */
trait PriorityTrait
{
    /**
     * Should be set via Objects.yaml
     *
     * @var int
     */
    protected $priority = 1;

    /**
     * Returns 1 as default, or configured integer.
     *
     * @return int
     */
    public function getPriority()
    {
        return (int) $this->priority;
    }
}
