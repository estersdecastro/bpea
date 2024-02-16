<?php
session_start();

// Verifica se o usuário está logado
//if (!isset($_SESSION['user_id'])) {
//    header("Location: index.php");
//    exit();
//}

// Aqui você pode buscar mais informações sobre o usuário se necessário
//$user = getUserFromDatabase($_SESSION['user_id']);

// Fulano = "<?php echo $_SESSION['user_id']; interrgação>

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo ao Dashboard</h1>
    <p>Olá, Fulano. Você está logado</p>
    <h2>Formulário de Pesquisa</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <label for="query">Pesquisa:</label><br>
      <input type="text" id="query" name="query" value=""><br>
      <input type="submit" value="Submit">
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
  
  
  <p><a href="index.php">Sair</a></p>
</body>
</html>

