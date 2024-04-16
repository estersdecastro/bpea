<?php 
ob_start(); 
require_once('/back/config.php');
require_once("/styles/header.php");

$message = "";

if (isset($_SESSION['error'])) {
    $message = $_SESSION["error"];
    unset($_SESSION['error']);
}

?>

<h1>Login</h1> 

<?php if(!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>


<form action="/back/login_action.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Entrar">
</form>


<div class="form-group row">
    <a href="/pages/signup.php">Não tem Login? Cadastre-se</a>
</div>

</div>

<?php require_once("/styles/footer.php"); ?>