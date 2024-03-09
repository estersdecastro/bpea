<?php
$dbUrl = 'postgres://neon:J57XpzgGhAqP@ep-quiet-frog-a5ckq1hy.us-east-2.aws.neon.tech/neondb?sslmode=require&options=project%3Dep-quiet-frog-a5ckq1hy';

$dbParts = parse_url($dbUrl);

$dbData = new stdClass();
$dbData->driver = 'pgsql';
$dbData->host = $dbParts['host'];
$dbData->port = 5432; // Porta padrão para PostgreSQL
$dbData->dbname = ltrim($dbParts['path'], '/');
$dbData->user = $dbParts['user'];
$dbData->password = $dbParts['pass'];
$dbData->options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dbData->connection = new PDO($dbData->driver . ':host=' . $dbData->host . ';port=5432;dbname=' . $dbData->dbname, $dbData->user, $dbData->password);
?>