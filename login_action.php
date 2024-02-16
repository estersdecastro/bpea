<?php 
ob_start(); // Inicia o buffer de saída
require_once(__DIR__ . '/config.php');

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = htmlspecialchars($_POST['password']); // Usa htmlspecialchars em vez de FILTER_SANITIZE_STRING

if (!$email || !$password) {
    $_SESSION['error'] = 'O email e a senha devem ser preenchidos';
    header("Location: erro.php");
    exit();
}

$sqlUser = "SELECT * FROM \"Usuario\" WHERE email = :email";
$stmtUser = $dbData->connection->prepare($sqlUser);
$stmtUser->bindValue(':email', $email);
$stmtUser->execute();

if ($stmtUser->rowCount() > 0) {
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['success'] = 'Login efetuado com sucesso';
        header("Location: dashboard.php");
        
      
    } else {
        $_SESSION['error'] = 'Senha incorreta';
        header("Location: index.php");
        
    }
} else {
    $_SESSION['error'] = 'Usuário não encontrado';
    header("Location: index.php");
    
}
//ob_end_flush(); // Envia o conteúdo do buffer de saída e desliga o buffer de saída