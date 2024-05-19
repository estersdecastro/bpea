<?php
$host = ''; // Altere para o seu host PostgreSQL
$db   = ''; // Altere para o seu banco de dados PostgreSQL
$user = ''; // Altere para o seu usuário PostgreSQL
$pass = ''; // Altere para a sua senha PostgreSQL
$charset = 'utf8';

$dsn = "pgsql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

return $pdo;
?>