<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: UserLogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - BPEA</title>

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
            <br>
            <img src="/logo.png" alt="Logo BPEA" width="200" height="200"><br>
            <br>
            <h1>BPEA - UFPA</h1>
            <p>Banco de Dados de Produtos Educacionais Acessíveis - UFPA</p>
            <hr>
            <br>
            <p><a href="/Upload.php" class="btn btn-primary">Cadastrar Material</a>
            <a href="/pesquisa.php" class="btn btn-primary">Consultar Material</a></p>           
               
        </div>
        <br><br>
    
        
        <nav class="text-center">
            <a href="/index.php" class="btn btn-danger">Sair</a>
        </nav>

    </body>
</html>