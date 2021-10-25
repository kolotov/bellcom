<?php

declare(strict_types=1);

namespace App;

use App\Meeting as Meeting;
use Exception;
use mysqli;

/**
 * The class for connect db and getting data meeting from db
 *
 * */
class DBMeeting
{
    private mysqli $_db;
    private $_servername;
    private $_username;
    private $_password;
    private $_database;

    public function __construct(string $servername, string $username, string $password, string $database)
    {
        $this->_servername = $servername;
        $this->_username   = $username;
        $this->_password   = $password;
        $this->_database   = $database;
    }

    private function _connect(): void
    {
        $this->_db = new mysqli(
            $this->_servername,
            $this->_username,
            $this->_password,
            $this->_database,
            3306
        );

        if ($this->_db->connect_error) {
            throw new Exception("Connection failed: " . $this->_db->connect_error);
        }

        //set charset for to check character set
        $this->_db->set_charset("latin1");
    }

    private function _close(): void
    {
        $this->_db->close();
    }

    public function getPathByFileId(string $table, int $id)
    {
        $this->_connect();

        //values are of fixed types also string escaping
        //this is to prevent SQL-injection
        $query = sprintf(
            "SELECT `file_path`  FROM `%s` WHERE `file_id` = %d",
            $this->_db->real_escape_string($table),
            $id
        );

        $result = $this->_db->query($query);

        $this->_close();

        if ($result === false) {
            return '';
        }

        $row = $result->fetch_assoc();

        return $row['file_path'] ?? '';
    }
}
