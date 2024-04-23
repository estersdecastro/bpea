<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<?php
    $sql = $dbData->connection->query("SELECT * FROM \"Categorias\"");
    $categorias = [];
    if ($sql->rowCount() > 0) $categorias = $sql->fetchAll(PDO::FETCH_ASSOC) 
?>

<?php   
    if (!file_exists(__DIR__ . "/arquivos")) {
    mkdir(__DIR__ . "/arquivos", 0777, true);}
?>

<?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if a file has been uploaded
        if (isset($_FILES['local'])) {
            $local_tmp = $_FILES['local']['tmp_name'];
            $file_name = $_FILES['local']['name'];
            $file_path = "arquivos/" . md5(uniqid()) . "_" . $file_name;
            
            // Move the uploaded file to the designated directory
            move_uploaded_file($local_tmp, __DIR__ . "/" . $file_path);
            
            // Generate the file URL
            $file_url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $file_path;
            
            // Store the file URL for later use
            $local = $file_url;
        } else {
            $local = "";
        }
    }
?>

<?php include "/cadastro_material_form.php" ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // coleta o valor de entrada do formulário
        $titulo = htmlspecialchars($_REQUEST['titulo']); 
        $ano = htmlspecialchars($_REQUEST['ano']);
        $keyword = htmlspecialchars($_REQUEST['keyword']);
        $formato = htmlspecialchars($_REQUEST['formato']); 
        $curso = htmlspecialchars($_REQUEST['curso']);
        $disciplina = htmlspecialchars($_REQUEST['disciplina']);
        $tipo = htmlspecialchars($_REQUEST['tipo']);
        $tipo_def = htmlspecialchars($_REQUEST['tipo_de_deficiencia']); 
        $id_categoria = htmlspecialchars($_REQUEST['id_categoria']); 
        $uso = htmlspecialchars($_REQUEST['uso']); 
        $fonte_original = htmlspecialchars($_REQUEST['fonte_original']); 
        $cid_pcd = htmlspecialchars($_REQUEST['cid_pcd']);
        $descricao = htmlspecialchars($_REQUEST['descricao']);

        if (isset($_FILES['local'])) {
            $local_tmp = $_FILES['local']['tmp_name'];
            $file_name = $_FILES['local']['name'];
            $file_path = "arquivos/" . md5(uniqid()) . "_" . $file_name;
            move_uploaded_file($local_tmp, __DIR__ . "/" . $file_path);
            $file_url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $file_path;
            $local = $file_url;
        } else {
            $local = "";
        }
?>
        
<?php
        // Execute a consulta SQL

      $sql = "INSERT INTO \"PEA\" (\"titulo\", \"keyword\", \"ano\", \"formato\", \"curso\", \"disciplina\", \"tipo\", \"tipo_de_deficiencia\", \"id_categoria\", \"local\", \"uso\", \"fonte_original\", \"cid_pcd\", \"descricao\") 
              VALUES (:titulo, :keyword, :ano, :formato, :curso, :disciplina, :tipo_de_deficiencia, :id_categoria, :local, :uso, :fonte_original, :cid_pcd, :descricao)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':keyword', $keyword);
        $stmt->bindValue(':ano', $ano);
        $stmt->bindValue(':formato', $formato);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':disciplina', $disciplina); 
        $stmt->bindValue(':tipo', $tipo);       
        $stmt->bindValue(':tipo_de_deficiencia', $tipo_def);
        $stmt->bindValue(':id_categoria', $id_categoria);
        $stmt->bindValue(':local', $local);
        $stmt->bindValue(':uso', $uso);
        $stmt->bindValue(':fonte_original', $fonte_original);
        $stmt->bindValue(':cid_pcd', $cid_pcd);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->execute();

        echo "Novo registro criado com sucesso";
    }
?>
    
  <br>
  <br>
  <p><a href="pesquisa.php">Pesquisar</a></p>
  <p><a href="dashboard.php">Voltar</a></p>


<?php include 'footer.php'; ?>