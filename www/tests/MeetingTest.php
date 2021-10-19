<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Meeting as Meeting;

class MeetingTest extends TestCase
{
    public function testMethodGetJsonDat()
    {
        $path = "data_xml/XML_1580.xml";
        $expected_json = '{"name":"Direktionsm\u00f8de","sysid":"1463","date":"2012-07-03 09:00"}';

        $this->assertEquals($expected_json, (new Meeting($path))->getJSONData());
    }

    public function testMethodGetXmlData()
    {
        $path = "data_xml/XML_1580.xml";
        $xml_data = '<fields>
                            <field name="Direktionsm&#xF8;de"/>
                            <field sysid="1463"/>
                            <field date="2012-07-03 09:00"/>
                    </fields>';

        $expected_xml = (new SimpleXMLElement($xml_data))->asXML();

        $clear = fn ($str) => str_replace(['\n', '  '], '', $str);

        $this->assertEquals($clear($expected_xml), $clear((new Meeting($path))->getXMLData()));
    }
}
