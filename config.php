<?php
    $host = 'pgsql.postgres.database.azure.com';
    $port = 5432;
    $dbname = 'dufpa';
    $user = 'bdufpa';
    $password = 'Mestreemen$ino2024'; 
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
?>

<?php
    try {
        $conn = new PDO($dsn);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro ao conectar ao PostgreSQL: " . $e->getMessage();
        die();
    }
?>

<?php
    // Informações de conexão para a extensão PostgreSQL
    $connectionInfo = array(
        "host" => $host,
        "port" => $port,
        "dbname" => $dbname,
        "user" => $user,
        "password" => $password
    );

    // Converte o array de informações de conexão em uma string de conexão
    $connectionString = "";
    foreach ($connectionInfo as $key => $value) {
        $connectionString .= "$key=$value ";
    }

    // Conexão com o banco de dados usando a extensão PostgreSQL
    $pgsql_conn = pg_connect(trim($connectionString));
?>