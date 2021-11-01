<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Meeting as Meeting;

class MeetingTest extends TestCase
{
    public function testMethodGetJsonDat()
    {
        $path = "data_xml/data_1010.xml";
        $expected_json = '{"name":"Trainig for the team","sysid":"1463","date":"2020-02-11 19:00"}';

        $this->assertEquals($expected_json, (new Meeting($path))->getJSONData());
    }

    public function testMethodGetXmlData()
    {
        $path = "data_xml/data_1010.xml";
        $xml_data = '<fields>
                            <field name="Trainig for the team"/>
                            <field sysid="1463"/>
                            <field date="2020-02-11 19:00"/>
                    </fields>';

        $expected_xml = (new SimpleXMLElement($xml_data))->asXML();

        $clear = fn ($str) => str_replace(['\n', '  '], '', $str);

        $this->assertEquals($clear($expected_xml), $clear((new Meeting($path))->getXMLData()));
    }
}
