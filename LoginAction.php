<?php
session_start();

include '/config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: /login.php?error=invalid_credentials");
    exit;
}