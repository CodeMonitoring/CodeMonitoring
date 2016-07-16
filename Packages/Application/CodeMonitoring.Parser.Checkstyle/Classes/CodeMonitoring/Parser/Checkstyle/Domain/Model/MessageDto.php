<?php
namespace CodeMonitoring\Parser\Checkstyle\Domain\Model;

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
 *
 */
class MessageDto
{
    /**
     * Absolute name of file this message belongs to.
     *
     * @var string
     */
    protected $fileName;

    /**
     * Line number this message belongs to.
     *
     * @var int
     */
    protected $line;

    /**
     * Column number this message belongs to.
     *
     * @var int
     */
    protected $column;

    /**
     * Severity of message.
     *
     * Something like "error".
     *
     * @var string
     */
    protected $severity;

    /**
     * Message itself.
     *
     * Something like "Each PHP statement must be on a line by itself".
     *
     * @var string
     */
    protected $message;

    /**
     * Optional source, e.g. Sniff of PHP Code Sniffer.
     *
     * Something like "Generic.Formatting.DisallowMultipleStatements.SameLine".
     *
     * @var string
     */
    protected $source;

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return void
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param int $line
     * @return void
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return int
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param int $column
     * @return void
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param string $severity
     * @return void
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return void
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
}
