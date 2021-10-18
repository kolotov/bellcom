<?php

declare(strict_types=1);

use App\DBMeeting as DBMeeting;
use App\Meeting as Meeting;
use PHPUnit\Framework\TestCase;

class DBMeetingTest extends TestCase
{
    private DBMeeting $_db;

    public function setUp(): void
    {
        $this->_db = new DBMeeting(
            $_ENV['MYSQL_SERVER'],
            $_ENV['MYSQL_USER'],
            $_ENV['MYSQL_PASSWORD'],
            $_ENV['MYSQL_DATABASE']
        );
    }

    public function testGetMeetingById(): void
    {
        $id = 1580;
        $path = "data_xml/XML_1580.xml";
        $expected_meeting = (new Meeting())->setID(1580)->setPath($path);
        $meeting = $this->_db->getMeetingByID($id);

        $this->assertObjectEquals($expected_meeting, $meeting);
    }
}
