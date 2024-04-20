<?php
// Informações de conexão
$host = 'bdufpa-server.database.windows.net';
$port = 1433;
$dbname = 'bdufpa';
$user = 'bdufpa';
$password = 'Mestreemen$ino2024'; // Substitua pela sua senha

// Criação da string de conexão
$dsn = "sqlsrv:server=tcp:$host,$port;Database=$dbname";

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $dbData = new stdClass();
    $dbData->connection = $conn;
} catch (PDOException $e) {
    // Tratamento de erro
    echo "Erro ao conectar ao SQL Server: " . $e->getMessage();
    exit;
}

// Informações de conexão para a extensão SQL Server
$connectionInfo = array(
    "UID" => $user,
    "pwd" => $password,
    "Database" => $dbname,
    "LoginTimeout" => 1000,
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);
$serverName = "tcp:$host,$port";

// Conexão com o banco de dados usando a extensão SQL Server
$sqlsrv_conn = sqlsrv_connect($serverName, $connectionInfo);

if ($sqlsrv_conn === false) {
    // Tratamento de erro
    echo "Erro ao conectar ao SQL Server: ";
    die(print_r(sqlsrv_errors(), true));
}
//ok
?>

