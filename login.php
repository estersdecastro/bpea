<?php include  ob_start();  ?>
<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<?php
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


<form action="login_action.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Entrar">
</form>

<div class="form-group row">
    <a href="/signup.php">Não tem Login? Cadastre-se</a>
</div>

</div>

<?php  include 'footer.php'; ?>