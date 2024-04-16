<?php
session_start();

// Verifica se o usuário está logado
//if (!isset($_SESSION['user_id'])) {
//    header("Location: inicio.php");
//    exit();
//}

// Aqui você pode buscar mais informações sobre o usuário se necessário
//$user = getUserFromDatabase($_SESSION['user_id']);

?>

<?php require_once(__DIR__ . '/header.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <div clas="container">
    <p><a href="/pesquisa.php">Pesquisar</a></p>
    <p><a href="/cadastro_material.php">Cadastrar</a></p>
    </div>
      
    <!-- Formulário de pesquisa 
    <form method="post" action="">
      <!--<input type="text" name="query" placeholder="Digite sua pesquisa aqui">
        <input type="submit" value="Pesquisar-->
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // coleta o valor de entrada do formulário
      $query = htmlspecialchars($_REQUEST['query']); 
      if (empty($query)) {
        echo "Nada foi pesquisado.";
      } else {
        echo "O termo pesquisado foi: '$query'";
      }
    }
    ?>

  <p><a href="/inicio.php">Sair</a></p>
</body>
</html>

<?php require_once(__DIR__ . '/footer.php'); ?>