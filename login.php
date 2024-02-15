<?php require_once("header.php"); ?>

<h1>Login</h1>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error']; ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['success']; ?>
    </div>
<?php endif; ?>

<div class="container">

    <div class="form-group row">
        <form action="login_action.php" method="post">
            <div class="col-xs-1-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="col-xs-1-12">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-xs-1-12">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>

    <div class="form-group row">
        <a href="signup.php">Cadastrar</a>
    </div>

</div>

<?php require_once("footer.php"); ?>
