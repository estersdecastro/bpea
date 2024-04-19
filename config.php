<?php
session_start();

$dbData = new stdClass();
$dbData->host = 'bdufpa-server.database.windows.net"'; // Substitua pelo host do seu banco de dados
$dbData->driver = 'pgsql'; // Substitua pelo driver do seu banco de dados
$dbData->port = '1433'; // Substitua pela porta do seu banco de dados
$dbData->dbname = 'bdufpa'; // Substitua pelo nome do seu banco de dados
$dbData->user = 'bdufpa'; // Substitua pelo usuário do seu banco de dados
$dbData->password = 'Mestreemen$ino2024'; // Substitua pela senha do seu banco de dados
$dbData->options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dbData->connection = new PDO($dbData->driver . ':host=' . $dbData->host . ';port=' . $dbData->port . ';dbname=' . $dbData->dbname, $dbData->user, $dbData->password, $dbData->options);
?>
