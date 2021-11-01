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

    public function testGetMeetingPath(): void
    {
        $id = 1010;
        $path = "data_xml/data_1010.xml";

        $this->assertEquals($path, $this->_db->getPathByFileId('meetings_res', 1010));
    }
}
