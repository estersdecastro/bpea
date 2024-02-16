<?php
session_start();

// Verifica se o usuário está logado
//if (!isset($_SESSION['user_id'])) {
//    header("Location: index.php");
//    exit();
//}

// Aqui você pode buscar mais informações sobre o usuário se necessário
//$user = getUserFromDatabase($_SESSION['user_id']);

?>
<?php require_once(__DIR__ . '/header.php'); ?>

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
      // coleta os valores de entrada do formulário
      $nome = htmlspecialchars($_REQUEST['nome']); 
      $type = htmlspecialchars($_REQUEST['type']); 

      if (empty($nome) || empty($type)) {
        echo "Todos os campos são obrigatórios.";
      } else {
        echo "Categoria cadastrada com sucesso: '$nome', Tipo: '$type'";
        // Aqui você pode adicionar o código para salvar os dados no banco de dados
      }
    }
    ?>
  <a href="dashboard.php">Voltar</a>
  <p><a href="index.php">Sair</a></p>
</body>
</html>
<?php require_once(__DIR__ . '/footer.php'); ?>