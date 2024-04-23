<?php
    // Informações de conexão
    $host = 'pgsql.postgres.database.azure.com';
    $port = 5432;
    $dbname = 'bdufpa';
    $user = 'bdufpa';
    $password = 'Mestreemen$ino2024'; 

    // String de conexão para PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
?>

<?php
    try {
        // Conexão com o banco de dados usando PDO
        $conn = new PDO($dsn);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $dbData = new stdClass();
        $dbData->connection = $conn;
    } catch (PDOException $e) {
        // Tratamento de erro
        echo "Erro ao conectar ao PostgreSQL: " . $e->getMessage();
        exit;
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

<?php
    if ($pgsql_conn === false) {
        // Tratamento de erro
        echo "Erro ao conectar ao PostgreSQL: ";
        die(pg_last_error());
    }
?>