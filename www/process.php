<?php

declare(strict_types=1);

namespace App;

use Exception;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$method = $_REQUEST['method'] ?? '';
$meeting_id = $_REQUEST['id'] ?? '';
$meeting_id = is_numeric($meeting_id) ? intval($meeting_id) : '';

if (is_int($meeting_id) === false) {
    return;
}

$db = new DBMeeting(
    $_ENV['MYSQL_SERVER'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD'],
    $_ENV['MYSQL_DATABASE']
);

try {
    $path = $db->getPathByFileId('meetings_res', $meeting_id);
    $meeting = new Meeting($path);
} catch (Exception $e) {
    die;
}

switch ($method) {
case 'xml': $meeting->printXML();
    break;

case 'json': $meeting->printJSON();
    break;
}
