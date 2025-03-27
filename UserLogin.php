<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - BPEA</title>

        <style>
            .hidden {
                display: none;
            }
        </style>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="text-center">
            <img src="/logo.png" alt="Logo BPEA" width="200px" height="200px">            
            <h1>BPEA - UFPA</h1>
            <p>Banco de Dados de Produtos Educacionais Acessíveis - UFPA</p><br><hr>

            <p>Entre com seu email e senha</p>
                <div class="form-group d-flex justify-content-center">
                    <div class="form-group row" >
                        <form action="/LoginAction.php" method="post">
                            
                            <input type="email" id="email" name="email" placeholder=" Email"required><br><br>
                            
                            <input type="password" id="password" name="password" placeholder=" Senha"required><br><br>
                            <input class= "btn btn-primary" type="submit" value="Entrar">
                        </form>
                    </div>
                </div>

            <br>
            <a class="btn btn-primary" href="/UserSignup.php">Não tem Login? Cadastre-se</a>
            

        </div>
        
    </body>
</html>