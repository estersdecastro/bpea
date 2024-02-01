<?php

session_start();

$dbData = new stdClass();

$dbData->driver = 'pgsql';
$dbData->host = 'localhost';
$dbData->port = 5432;
$dbData->dbname = 'ester';
$dbData->user = 'postgres';
$dbData->password = 'admin';

$dbData->connection = new PDO(
    "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
    $dbData->user,
    $dbData->password
);
