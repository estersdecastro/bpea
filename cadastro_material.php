<?php
session_start();

$dbData = new stdClass();
$dbData->driver = 'pgsql';
$dbData->host = 'ep-little-pond-a5cdk7kd.us-east-2.aws.neon.tech';
$dbData->port = 5432;
$dbData->dbname = 'neondb';
$dbData->user = 'neon';
$dbData->password = 'RZMpPoCQDu43';

try {
    $dbData->connection = new PDO(
        "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
        $dbData->user,
        $dbData->password
    );
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once(__DIR__ . '/header.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Material</title>
</head>
<body>
    <h1>Cadastro de Material</h1>
    <p> </p>
    <h2>Formulário de Cadastro</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="col-xs-1-12">
          <label for="nome">Nome do Material</label>
          <input type="text" id="nome" name="nome" value=""><br>

          <label for="type">Tipo</label>
          <select name="type" id="type">
              <option value=""></option>
              <option value="video">Vídeo</option>
              <option value="audio">Áudio</option>
              <option value="image">Imagem</option>
              <option value="document">Documento</option>
          </select>
      </div>
      <input type="submit" value="Cadastrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome = htmlspecialchars($_REQUEST['nome']); 
      $type = htmlspecialchars($_REQUEST['type']); 

      if (empty($nome) || empty($type)) {
        echo "Todos os campos são obrigatórios.";
      } else {
        $sql = "INSERT INTO PEA (nome, type) VALUES (:nome, :type)";

        $stmt = $dbData->connection->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':type', $type);

        $stmt->execute();

        echo "Material cadastrado com sucesso: '$nome', Tipo: '$type'";
      }
    }
    ?>
  <a href="dashboard.php">Voltar</a>
  <p><a href="index.php">Sair</a></p>
</body>
</html>
<?php require_once(__DIR__ . '/footer.php'); ?>