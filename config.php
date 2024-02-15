<?php

session_start();

$dbData = new stdClass();

$dbData->driver = 'pgsql';
$dbData->host = 'ep-little-pond-a5cdk7kd.us-east-2.aws.neon.tech';
$dbData->port = 5432;
$dbData->dbname = 'neondb';
$dbData->user = 'neon';
$dbData->password = 'RZMpPoCQDu43';

$dbData->connection = new PDO(
    "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
    $dbData->user,
    $dbData->password
);
