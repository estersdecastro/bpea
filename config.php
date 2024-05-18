<?php
$host = 'ep-snowy-lake-a5vejy2z.us-east-2.aws.neon.tech'; // Altere para o seu host PostgreSQL
$db   = 'neondb'; // Altere para o seu banco de dados PostgreSQL
$user = 'neondb_owner'; // Altere para o seu usuário PostgreSQL
$pass = 'H6PjDo5fFTwz'; // Altere para a sua senha PostgreSQL
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