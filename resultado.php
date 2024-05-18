<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados - BPEA</title>

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

            <?php
            include 'config.php';
            
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            
            $stmt = $pdo->prepare("SELECT * FROM PEA WHERE id = :id");
            $stmt->execute(['id' => $id]); 
            $data = $stmt->fetch();
            
            if ($data) {
            ?>
            
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <title>Detalhes do Registro</title>
            </head>
            <body>
                <h1>Detalhes do Registro</h1>
            
                <p><strong>Título:</strong> <?php echo $data['titulo']; ?></p>
                <p><strong>Formato:</strong> <?php echo $data['formato']; ?></p>
                <p><strong>Recurso de Acessibilidade:</strong> <?php echo $data['acc_resources']; ?></p>
                <p><strong>Tipo de Deficiência:</strong> <?php echo $data['tipo_de_deficiencia']; ?></p>
                <p><strong>Arquivo:</strong> <a href="<?php echo $data['local']; ?>" target="_blank">Visualizar</a> <a href="<?php echo $data['local']; ?>" download>Baixar</a></p>
                <p><strong>Uso:</strong> <?php echo $data['uso']; ?></p>
                <p><strong>Fonte Original:</strong> <?php echo $data['fonte_original']; ?></p>
                <p><strong>Área de Conhecimento:</strong> <?php echo $data['id_categoria']; ?></p>
                <p><strong>Descrição:</strong> <?php echo $data['descricao']; ?></p>
            
            
                <a href="dashboard.php">Voltar</a>
            </body>
            </html>
            
            <?php
                } 
            
            
            
                $sql = 'SELECT * FROM "pea" ORDER BY titulo ASC';
                $titulo = $_GET['titulo'];
            
                if(!is_null($titulo) && !empty($titulo)) 
                    $sql = "SELECT * FROM \"pea\" WHERE titulo LIKE '".$titulo."' ORDER BY titulo ASC";
            
                $qry = $pdo->query($sql);
                $count = $qry->rowCount();
                $qry->execute();
                $data = $qry->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
            <h3 style="
                text-align: center;
                height: 7;
                margin-top: 150;
                margin-bottom:70;
            "> Resultados da Consulta de PEA </h3><br><br>
            
            <?php
                if(!is_null($titulo) && !empty($titulo)) {
                    if($count > 0) {
                        echo 'Encontrado registros com o título ' . $titulo;?>   
                    <div>
                        <table class="table table-striped">
                            <thead>
                              <th>Título</th>
                              <th>Formato</th>
                              <th>Recurso de Acessibilidade</th>
                              <th>Tipo de Deficiência</th>
                              <th>Arquivo</th>
                              <th>Uso</th>
                              <th>Fonte Original</th>
                              <th>Área de Conhecimento</th>
                              <th>Descrição</th>
                            </thead>
            
                            <tbody>
                                <?php foreach($data as $row): ?>
                                    <tr>
                                        <td><?php echo $row['titulo']; ?></td>
                                        <td><?php echo $row['formato']; ?></td>
                                        <td><?php echo $row['acc_resources']; ?></td>
                                        <td><?php echo $row['tipo_de_deficiencia']; ?></td>
                                        <td>
                                            <a href="<?php echo $row['local']; ?>" target="_blank">Visualizar</a>
                                            <a href="<?php echo $row['local']; ?>" download>Baixar</a>
                                        </td>
                                        <td><?php echo $row['uso']; ?></td>
                                        <td><?php echo $row['fonte_original']; ?></td>
                                        <td><?php echo $row['id_categoria']; ?></td>
                                        <td><?php echo $row['descricao']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>     
                    </div>
            <?php }  
                else {
                        echo 'Nenhum registro foi encontrado com o título ' . $titulo; }}?>
            
            <br>
                    </div>
                </div>
            </div>
        </div> 
        </div>
        <nav class="text-center"><br><br
         <p>
            <a href="/pesquisa.php" class="btn btn-primary">Nova Consulta</a>
            <a href="/Upload.php" class="btn btn-primary">Cadastrar Material</a>
            <a href="/Dashboard.html" class="btn btn-secondary">Retornar ao início</a>
            <a href="/index.php" class="btn btn-danger">Sair</a>             
         </p>  
        </nav>
    </body>
</html>    
