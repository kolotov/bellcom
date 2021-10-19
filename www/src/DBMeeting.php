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

        $this->_db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
        if ($this->_db->connect_error) {
            throw new Exception("Connection failed: " . $this->_db->connect_error);
        }
    }

    private function _close(): void
    {
        $this->_db->close();
    }

    public function getPathByFileId(string $table, int $id)
    {
        $this->_connect();
        $result = $this
            ->_db
            ->query("SELECT `file_path`  FROM `{$table}` WHERE `file_id` = {$id}");

        $this->_close();

        if ($result === false) {
            return '';
        }

        $row = $result->fetch_assoc();

        return $row['file_path'] ?? '';
    }
}
