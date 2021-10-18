<?php

declare(strict_types=1);

namespace App;

use App\Meeting as Meeting;
use App\DBMeeting as DBMeeting;
use Exception;

class LoadMeeting
{
    private $_id;
    private $_db;
    private $_meeting;
    private $_error;

    public function __construct(int $id_meeting, DBMeeting $db_meeting)
    {
        $this->_id = $id_meeting;
        $this->_db = $db_meeting;
    }

    public function Load(): bool
    {
        try {
            $this->_meeting = $this->_db->getMeetingByID($this->_id);
        } catch (Exception $e) {
            $this->_error = 'Caught exception: ' .  $e->getMessage();
            return false;
        }

        return true;
    }

    public function getMeeting(): Meeting
    {
        return $this->_meeting;
    }

    public function getError(): string
    {
        return $this->_error;
    }
}
