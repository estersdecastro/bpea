<?php require_once('header.php'); ?>
    <h2>Formulário de Cadastro</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value=""><br>

        <label for="tipo">Tipo</label>
        <select id="tipo" name="tipo">
            <option value="">Selecione o Tipo</option>
            <option value="deficiencia_visual">Deficiência Visual</option>
            <option value="deficiencia_auditiva">Deficiência Auditiva</option>
            <option value="deficiencia_fisica">Deficiência Física</option>
            <option value="deficiencia_intelectual">Deficiência Intelectual</option>
            <!-- Adicione mais opções conforme necessário -->
        </select><br>

        <label for="formato">Formato</label>
        <select id="formato" name="formato">
            <option value="">Selecione o Formato</option>
            <option value="audio">Áudio</option>
            <option value="video">Vídeo</option>
            <option value="imagem">Imagem</option>
            <option value="documento">Documento</option>
            <!-- Adicione mais opções conforme necessário -->
        </select><br>

        <label for="id_categoria">ID da Categoria</label>
        <input type="number" id="id_categoria" name="id_categoria" value=""><br>

        <label for="local">Local</label>
        <input type="file" id="local" name="local" value=""><br>

        <label for="uso">Uso</label>
        <input type="text" id="uso" name="uso" value=""><br>

        <label for="fonte_original">Fonte Original</label>
        <input type="text" id="fonte_original" name="fonte_original" value=""><br>

        <label for="cid_pcd">CID PCD</label>
        <input type="text" id="cid_pcd" name="cid_pcd" value=""><br>

        <label for="comentario">Comentário</label>
        <textarea id="comentario" name="comentario"></textarea><br>

        <input type="submit" value="Cadastrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // coleta o valor de entrada do formulário
        $titulo = htmlspecialchars($_REQUEST['titulo']); 
        $formato = htmlspecialchars($_REQUEST['formato']); 
        $tipo = htmlspecialchars($_REQUEST['tipo']); 
        $id_categoria = htmlspecialchars($_REQUEST['id_categoria']); 
        $uso = htmlspecialchars($_REQUEST['uso']); 
        $fonte_original = htmlspecialchars($_REQUEST['fonte_original']); 
        $cid_pcd = htmlspecialchars($_REQUEST['cid_pcd']); 
        $comentario = htmlspecialchars($_REQUEST['comentario']);

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
        require 'config.php';

        // Conecte-se ao banco de dados
        $conexao = new PDO(
            "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
            $dbData->user,
            $dbData->password
        );


        // Execute a consulta SQL
        $sql = "INSERT INTO \"PEA\" (titulo, formato, tipo, id_categoria, local, uso, fonte_original, cid_pcd, comentario) 
                VALUES (:titulo, :formato, :tipo, :id_categoria, :local, :uso, :fonte_original, :cid_pcd, :comenn m jnjn  n ario)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':formato', $formato);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':local', $local);
        $stmt->bindParam(':uso', $uso);
        $stmt->bindParam(':fonte_original', $fonte_original);
        $stmt->bindParam(':cid_pcd', $cid_pcd);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();

        echo "Novo registro criado com sucesso";
    }
    ?>

  <p><a href="pesquisa.php">Pesquisar</a></p>
  <p><a href="dashboard.php">Voltar</a></p>
  <p><a href="index.php">Sair</a></p>
<?php include 'footer.php'; ?>