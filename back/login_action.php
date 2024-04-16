<?php 
require_once( '/back/config.php');

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'password');


if (!$email || !$senha) {
    $_SESSION['error'] = 'O email e a senha devem ser preenchidos';
    header("Location: /pages/login.php");
    exit();
}

$sqlUser = "SELECT * FROM \"Usuario\" WHERE email = :email";
$stmtUser = $dbData->connection->prepare($sqlUser);
$stmtUser->bindValue(':email', $email);
$stmtUser->execute();

if ($stmtUser->rowCount() > 0) {
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['success'] = 'Login efetuado com sucesso';
        header("Location: .//pages/dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = 'Senha incorreta';
        header("Location: /pages/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Usuário não encontrado';
    header("Location: /pages/login.php");
    exit();
}