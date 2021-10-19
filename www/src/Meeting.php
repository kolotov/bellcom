<?php

declare(strict_types=1);

namespace App;

use Exception;
use SimpleXMLElement;

/**
 * The class keep data about meeting
 *
 * */

class Meeting
{
    private SimpleXMLElement $_xml;

    public function __construct(string $path)
    {
        $this->loadFromXMLFile($path);
    }

    public function loadFromXMLFile(string $path): self
    {
        if (!file_exists($path)) {
            throw new Exception('File not found');
        }

        $xml = simplexml_load_file($path, null, LIBXML_NOERROR);

        if (!is_object($xml)) {
            throw new Exception('Parsing error');
        }

        $meeting_arr = $xml->xpath("/root/table[@name='meeting']/*");

        if (!count($meeting_arr)) {
            throw new Exception('Meeting data not found');
        }

        $xml = $meeting_arr[0];

        //create new object format xml version="1.0"
        $this->_xml = new SimpleXMLElement($xml->asXML());

        return $this;
    }

    public function getXMLData(): string
    {
        return $this->_xml->asXML();
    }

    public function getJSONData(): string
    {
        return json_encode($this->_toArray());
    }


    private function _toArray(): array
    {
        $fields = $this->_xml->xpath("field/@*");

        if (!count($fields)) {
            throw new Exception("Error convertation XML to arrry. Field not found");
        }

        return array_reduce(
            $fields,
            function ($attrs, SimpleXMLElement $xml_obj) {
                $name = $xml_obj->getName();
                [$attrs[$name],] = (array) $xml_obj->$name;
                return $attrs;
            },
            []
        );
    }

    public function printXML(): void
    {
        header('Content-Type: application/xml; charset=utf-8');
        print($this->getXMLData());
    }

    public function printJSON(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        ob_start();
        try {
            print($this->getJSONData());
        } catch (Exception $e) {
            ob_end_clean();
        }
    }
}
