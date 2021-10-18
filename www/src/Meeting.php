<?php

declare(strict_types=1);

namespace App;

use Exception;
use SimpleXMLElement;

class Meeting
{
    private $_id;
    private $_path;
    private $_xml;

    public function __construct()
    {
    }

    public function setID(int $id): self
    {
        $this->_id = $id;
        return $this;
    }

    public function setPath(string $path): self
    {
        $this->_path = $path;
        return $this;
    }

    public function loadXMLFile(): self
    {
        if (file_exists($this->_path)) {
            $this->_xml = simplexml_load_file($this->_path);
        } else {
            throw new Exception('Failed to open test.xml.');
        }

        return $this;
    }

    public function getID(): int
    {
        return $this->_id;
    }

    public function getPath(): string
    {
        return $this->_path;
    }

    public function getXMLData(): SimpleXMLElement
    {
        return $this->_xml;
    }

    public function equals(self $other): bool
    {
        return
            $this->getID() === $other->getID() ||
            $this->getPath() === $other->getPath();
    }
}
