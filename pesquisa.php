<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta - BPEA</title>

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

    <body class= "text-center">
        <div class="text-center">
            <br>
            <img src="logo.png" alt="Logo BPEA" width="288" height="96"><br>
            <br>
            <h1>BPEA - UFPA</h1>
            <p>Banco de Dados de Produtos Educacionais Acessíveis - UFPA</p>
            <hr>
            <br>

            <?php $pdo = include 'config.php'; ?>
            <?php error_reporting(E_ERROR | E_PARSE); ?>

            <?php
                $sql = 'SELECT * FROM "pea" ORDER BY titulo ASC';
                $titulo = $_GET['titulo'];

                if(!is_null($titulo) && !empty($titulo)) 
                    $sql = "SELECT * FROM \"pea\" WHERE titulo LIKE '".$titulo."' ORDER BY titulo ASC";

                $qry = $pdo->query($sql);
                $count = $qry->rowCount();
                $qry->execute();
                $data = $qry->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <h1 style="
                text-align: center;
                height: 7;
                margin-top: 150;
                margin-bottom:70;
            "> Consulta de PEA </h1>

            <form method="get">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="titulo">Título: </label>
                        <input class="form-control" id="titulo" placeholder="Título do PEA" name="titulo" value="<?= $titulo ?? "" ?>">
                    </div>
                </div>
              <br>
                <button type="submit" class="btn btn-primary" style="margin-top: 24;">Buscar</button>
            </form>

            <?php
                if(!is_null($titulo) && !empty($titulo)) {
                    if($count > 0) {
                        echo 'Encontrado registros com o título ' . $titulo;
            ?>   
                        <table class="table table-striped">
                          <thead>
                            <th>Título</th>
                            <th>Formato</th>
                            <th>Recursos de Acessibilidade</th>
                            <th>Tipo de Deficiência</th>
                            <th>Uso</th>
                          </thead>

                          <tbody>
                            <?php foreach($data as $row): ?>
                              <tr>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['formato']; ?></td>
                                <td><?php echo $row['acc_resources']; ?></td>
                                <td><?php echo $row['tipo_de_deficiencia']; ?></td>
                                <td><?php echo $row['uso']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                      </table>
                      <a href="resultado.php?titulo=<?= urlencode($titulo) ?>">Ver resultados completos</a>     

            <?php }  
                else {
                        echo 'Nenhum registro foi encontrado com o título ' . $titulo;
                    }
                }
            ?>

            <br>
                    <br><br>

                    <a href="/Dashboard.html" class="btn btn-primary">Retornar ao Dashboard</a><br>
                    <a href="/Upload.php" class="btn btn-primary">Cadastrar Material</a><br>
                    <a href="/index.php" class="btn btn-danger">Sair</a>    


        </div>
    </body>
</html>
