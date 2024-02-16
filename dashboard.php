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

<?php require_once(__DIR__ . '/header.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    
    <p><a href="pesquisa.php">Pesquisar</a></p>
    <p><a href="cadastro_material.php">Cadastrar</a></p>
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

<?php require_once(__DIR__ . '/footer.php'); ?>