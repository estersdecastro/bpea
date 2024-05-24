<?php 
session_start();
include '/config.php';
$dbData = new stdClass();
$dbData->connection = $pdo; 

// Recebe os dados do formulário
$titulo = $_POST['titulo'];
$keyword = $_POST['keyword'];
$ano = $_POST['ano'];
$id_categoria = $_POST['id_categoria'];
$formato = $_POST['formato'];
$acc_resources = $_POST['acc_resources'];
$tipo_de_deficiencia = $_POST['tipo_de_deficiencia'];
$uso = $_POST['uso'];
$fonte_original = $_POST['fonte_original'];
$descricao = $_POST['descricao'];

$titulo = $pdo->quote($titulo);
$keyword = $pdo->quote($keyword);
$ano = $pdo->quote($ano);
$id_categoria = $pdo->quote($id_categoria);
$formato = $pdo->quote($formato);
$acc_resources = $pdo->quote($acc_resources);
$tipo_de_deficiencia = $pdo->quote($tipo_de_deficiencia);
$uso = $pdo->quote($uso);
$fonte_original = $pdo->quote($fonte_original);
$descricao = $pdo->quote($descricao);

// Tratamento do arquivo enviado
$target_dir = "/uploads/";
$target_file = $target_dir . basename($_FILES["local"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Tenta mover o arquivo enviado para a pasta de uploads
if (!move_uploaded_file($_FILES["local"]["tmp_name"], $target_file)) {
    echo "Desculpe, houve um erro ao fazer upload do seu arquivo.";
    exit;
}

// Consulta SQL para inserir o novo produto

$sql = "INSERT INTO pea (titulo, keyword, ano, id_categoria, formato, acc_resources, tipo_de_deficiencia, uso, local, fonte_original, descricao) VALUES ($titulo, $keyword, $ano, $id_categoria, $formato, $acc_resources, $tipo_de_deficiencia, $uso, '$target_file', $fonte_original, $descricao)";

if ($pdo->exec($sql))  {
    // O produto foi criado com sucesso, redireciona para a página de sucesso
    $_SESSION['success'] = "Upload realizado com sucesso!";
    header("Location: /Upload.php");
} else {
    // Houve um erro ao criar o produto, redireciona de volta para a página de upload com uma mensagem de erro
    header("Location: /Upload.php?error=upload_failed");
}


?>