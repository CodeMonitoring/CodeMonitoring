<?php
namespace CodeMonitoring\Parser\Phpmd\Parser;

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
use CodeMonitoring\Framework\Parse\ParserInterface;

/**
 * Parser for PHP phpmd xml format.
 *
 * TODO: Not finished yet, finish Checkstyle parser first.
 */
abstract class PhpmdXmlParser implements ParserInterface
{
    public function canParse(Resource $file)
    {
        return true;
    }

    public function getPriority()
    {
        return 2;
    }
}
