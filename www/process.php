<?php

declare(strict_types=1);

namespace App;

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

$load_meeting = new LoadMeeting($meeting_id, $db);

if ($load_meeting->Load() === false) {
    return;
}

$meeting = $load_meeting->getMeeting();

if ($method === 'xml') {
    $xml = $meeting->getXMLData();
    header('Content-Type: application/xml; charset=utf-8');
    print($xml->asXML());
    exit(1);
}

if ($method === 'json') {
    $json = $meeting->getJSONData();
    header('Content-Type: application/json; charset=utf-8');
    print($json);
    exit(1);
}
