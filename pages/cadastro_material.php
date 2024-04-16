<?php
    require_once './back/config.php';
    $sql = $dbData->connection->query("SELECT * FROM \"Categorias\"");
    $categorias = [];
    if ($sql->rowCount() > 0) $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    if (!file_exists(__DIR__ . "/arquivos")) {
        mkdir(__DIR__ . "/arquivos", 0777, true);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {}
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

<?php require_once('/styles/header.php'); ?>
    <h2>Formulário de Cadastro</h2><br>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value=""><br> 

        <label for="keyword">Palavra-Chave</label>
        <input type="text" id="keyword" name="keyword" value=""><br>

        <label for="ano">Ano</label>
        <input type="text" id="ano" name="ano" value=""><br>

        <label for="formato">Format o</label>
          <select id="formato" name="formato">
              <option value="">Selecione o Formato</option>
              <option value="audio">Áudio</option>
              <option value="video">Vídeo</option>
              <option value="imagem">Imagem</option>
              <option value="documento">Documento</option>
              <option value="audio_desc">Áudiodescrição
              </option>
              <option value="libras">Libras</option>
              <option value="braille">Braille</option>
        </option>
              <option value="tatil">Tátil</option>
              <!-- Adicione mais opções conforme necessário -->
          </select><br>


        <label for="curso">Curso</label>
        <input type="text" id="curso" name="curso" value=""><br>

        <label for="disciplina">Disciplina</label>
        <input type="text" id="disciplina" name="disciplina" value=""><br>
        
        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" value=""><br>

        <label for="tipo_de_deficiencia">Tipo de Deficiência</label>
        <select id="tipo_de_deficiencia" name="tipo_de_deficiencia">
            <option value="">Selecione o Tipo de Deficiência</option>
            <option value="deficiencia_visual">Deficiência Visual</option>
            <option value="deficiencia_auditiva">Deficiência Auditiva</option>
            <option value="deficiencia_fisica">Deficiência Física</option>
            <option value="deficiencia_intelectual">Deficiência Intelectual</option>
            <!-- Adicione mais opções conforme necessário -->
        </select><br>

        <label for="id_categoria">ID da Categoria</label>
        <select id="id_categoria" name="id_categoria">
            <option value="">Selecione a Categorias</option>
            <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nome']; ?></option>
                
            <?php endforeach; ?>
            <!-- Adicione mais opções conforme necessário -->
        </select><br>
        
        <label for="local">Upload</label>
        <input type="file" id="local" name="local" value=""><br>

        <label for="uso">Uso</label>
        <input type="text" id="uso" name="uso" value=""><br>

        <label for="fonte_original">Fonte Original</label>
        <input type="text" id="fonte_original" name="fonte_original" value=""><br>

        <label for="cid_pcd">CID PCD</label>
        <input type="text" id="cid_pcd" name="cid_pcd" value=""><br>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao"></textarea><br>

        <br><input type="submit" value="Cadastrar">
    </form>

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
        require_once '/back/config.php';

        // Conecte-se ao banco de dados
        $conexao = new PDO(
            "{$dbData->driver}:host={$dbData->host};port={$dbData->port};dbname={$dbData->dbname}",
            $dbData->user,
            $dbData->password
        );


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
  <p><a href="/pages/pesquisa.php">Pesquisar</a></p>
  <p><a href="/pages/dashboard.php">Voltar</a></p>
  <p><a href="/pages/inicio.php">Sair</a></p>
<?php include '/styles/footer.php'; ?>