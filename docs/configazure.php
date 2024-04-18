<?php
session_start();
$dbUrl = '';

$dbParts = parse_url($dbUrl);

$dbData = new stdClass();
$dbData->driver = getenv('DB_DRIVER');
$dbData->host = getenv('DB_HOST');
$dbData->port = getenv('DB_PORT');
$dbData->dbname = getenv('DB_NAME');
$dbData->user = getenv('DB_USER');
$dbData->password = getenv('DB_PASSWORD');
$dbData->options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dbData->connection = new PDO($dbData->driver . ':host=' . $dbData->host . ';port=5432;dbname=' . $dbData->dbname, $dbData->user, $dbData->password, $dbData->options);
?>
