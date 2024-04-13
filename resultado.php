<?php
    error_reporting(E_ERROR | E_PARSE);

    // Inclua o arquivo de configuração
    require 'config.php';

    $lnk = new PDO(
        "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
        $dbData->user,
        $dbData->password
    );

    $titulo = $_GET['titulo'];

    $sql = 'SELECT * FROM "PEA" ORDER BY titulo ASC';

    if(!is_null($titulo) && !empty($titulo)) 
        $sql = "SELECT * FROM \"PEA\" WHERE titulo LIKE '".$titulo."' ORDER BY titulo ASC";

    $qry = $lnk->query($sql);
    $count = $qry->rowCount();
    $qry->execute();
    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<h1 style="
    text-align: center;
    height: 7;
    margin-top: 150;
    margin-bottom:70;
"> Resultados da Consulta de PEA </h1>

<?php
    if(!is_null($titulo) && !empty($titulo)) {
        if($count > 0) {
            echo 'Encontrado registros com o título ' . $titulo;
?>   
            <table class="table table-striped">
                <thead>
                  <th>Título</th>
                  <th>Formato</th>
                  <th>Tipo</th>
                  <th >Local</th>
                  <th>Uso</th>
                  <th>Fonte Original</th>
                  <th>CID PCD</th>
                  <th>Comentário</th>
                </thead>

                <tbody>
                  <?php foreach($data as $row): ?>
                    <tr>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['formato']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['tipo_def']; ?></td>
                        <td>
                          <a href="<?php echo $row['local']; ?>" target="_blank">
                            Baixar
                          </a>
                        </td>
                        <td><?php echo $row['uso']; ?></td>
                        <td><?php echo $row['fonte_original']; ?></td>
                        <td><?php echo $row['cid_pcd']; ?></td>
                        <td><?php echo $row['comentario']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>     

<?php }  
    else {
            echo 'Nenhum registro foi encontrado com o título ' . $titulo;
        }
    }
?>

<p><a href="cadastro_material.php">Cadastrar Novo Material</a></p>
<p><a href="dashboard.php">Voltar</a></p>
<p><a href="index.php">Sair</a></p>
<?php include 'footer.php'; ?>