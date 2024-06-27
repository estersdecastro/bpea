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

    <body class="text-center">

        <div class="text-center">
            
            <img src="/logo.png" alt="Logo BPEA" width="880px" height="176px">
            <hr><br><br>
            

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

            <h1> Consulta de Materiais </h1>
        </div>
        
        <div class="form-group d-flex justify-content-center">
                <form method="get">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <br>
                            <input class="w-auto p-3" id="titulo" placeholder="Título do PEA" name="titulo" value="<?= $titulo ?? "" ?>">
                        </div>
                    </div>
        
                  
                    <button type="submit" class="btn btn-info" style="margin-top: 24;">Buscar</button><br><br><hr>
        </div>
                </form>
                    <div class="form-group d-flex justify-content-center">
                        <?php
                            if(!is_null($titulo) && !empty($titulo)) {
                                if($count > 0) {
                                    echo 'Encontrado registros com o título ' . $titulo;
                        ?>
                    </div>
                                
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
                    </div>
        </div>
        <div>
            
            <a href="resultado.php?titulo=<?= urlencode($titulo) ?>" class="btn btn-info" >Ver resultados completos</a><br><br><br>    
        </div>
        <?php }  
            else {
                    echo 'Nenhum registro foi encontrado com o título ' . $titulo;
                }
            }
        ?> 
</div>
</div>
<nav class="text-center">
 <p></p><a href="/Dashboard.html" class="btn btn-primary">Retornar ao início</a>
  <a href="/Upload.php" class="btn btn-primary">Cadastrar Material</a>
  <a href="/index.php" class="btn btn-danger">Sair</a></p>  
</nav>
    </body>
</html>
