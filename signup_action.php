<?php
require_once("config.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$social_name = filter_input(INPUT_POST, 'social_name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cellphone = filter_input(INPUT_POST, 'cellphone', FILTER_SANITIZE_STRING);
$pcd = filter_input(INPUT_POST, 'pcd');
$pcd_type = filter_input(INPUT_POST, 'pcd_type', FILTER_SANITIZE_STRING);
$campus = filter_input(INPUT_POST, 'campus', FILTER_SANITIZE_STRING);
$instituto = filter_input(INPUT_POST, 'instituto', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

if (!$name)
{
    $_SESSION['error'] = 'O nome deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$social_name)
{
    $_SESSION['error'] = 'O nome social deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$email)
{
    $_SESSION['error'] = 'O email deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$cellphone)
{
    $_SESSION['error'] = 'O celular deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$campus)
{
    $_SESSION['error'] = 'O campus deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$instituto)
{
    $_SESSION['error'] = 'O instituto deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if (!$password)
{
    $_SESSION['error'] = 'A senha deve ser preenchida';
    header("Location: signup.php");
    exit();
}

if (!$type)
{
    $_SESSION['error'] = 'O tipo deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if ($pcd && !$pcd_type) {
    $_SESSION['error'] = 'O tipo de PCD deve ser preenchido';
    header("Location: signup.php");
    exit();
}

$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
$siape = filter_input(INPUT_POST, 'siape', FILTER_SANITIZE_STRING);
$course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
$nucleo = filter_input(INPUT_POST, 'nucleo', FILTER_SANITIZE_STRING);

if ($type != "colaborador" && $type != "discente" && $type != "docente" && $type != "tae" && $type != "tec_acc") {
    $_SESSION['error'] = 'Tipo inválido';
    header("Location: signup.php");
    exit();
}

if ($type == "colaborador" && (!$cpf))
{
    $_SESSION['error'] = 'O CPF deve ser preenchido';
    header("Location: signup.php");
    exit();
}

if ($type == "discente" && (!$matricula || !$course))
{
    $_SESSION['error'] = 'A matrícula e o curso devem ser preenchidos';
    header("Location: signup.php");
    exit();
}

if ($type == "docente" && (!$siape || !$nucleo || !$course))
{
    $_SESSION['error'] = 'O SIAPE, o núcleo e o curso devem ser preenchidos';
}

if (($type == "tae" || $type == "tec_acc") && (!$siape || !$nucleo))
{
    $_SESSION['error'] = 'O CPF e a matrícula devem ser preenchidos';
    header("Location: signup.php");
    exit();
}

$sqlUser = "SELECT * FROM \"Usuario\" WHERE email = :email";
$stmtUser = $dbData->connection->prepare($sqlUser);
$stmtUser->bindValue(':email', $email);
$stmtUser->execute();

if ($stmtUser->rowCount() > 0) {
    $_SESSION['error'] = 'E-mail já cadastrado';
    header("Location: signup.php");
    exit;
}

$sql = "INSERT INTO \"Usuario\" (nome, nome_social, email, celular, pcd, pcd_tipo, campus, instituto, senha, tipo_login) VALUES (:nome, :nome_social, :email, :telefone, :pcd, :tipo_pcd, :campus, :instituto, :senha, :tipo_login)";
$stmt = $dbData->connection->prepare($sql);
$stmt->bindValue(':nome', $name);
$stmt->bindValue(':nome_social', $social_name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':telefone', $cellphone);
$stmt->bindValue(':pcd', $pcd);
$stmt->bindValue(':tipo_pcd', $pcd_type);
$stmt->bindValue(':campus', $campus);
$stmt->bindValue(':instituto', $instituto);
$stmt->bindValue(':senha', password_hash($password, PASSWORD_DEFAULT));
$stmt->bindValue(':tipo_login', $type);
$stmt->execute();

if ($type == "colaborador") {
    $sqlColaborador = "INSERT INTO \"Usuario_Colaborador\" (cpf, id_usuario) VALUES (:cpf, :id_usuario)";
    $stmtColaborador = $dbData->connection->prepare($sqlColaborador);
    $stmtColaborador->bindValue(':cpf', $cpf);
    $stmtColaborador->bindValue(':id_usuario', $dbData->connection->lastInsertId());
    $stmtColaborador->execute();
}

if ($type == "discente") {
    $sqlDiscente = "INSERT INTO \"Usuario_Discente\" (matricula, curso, id_usuario) VALUES (:matricula, :curso, :id_usuario)";
    $stmtDiscente = $dbData->connection->prepare($sqlDiscente);
    $stmtDiscente->bindValue(':matricula', $matricula);
    $stmtDiscente->bindValue(':curso', $course);
    $stmtDiscente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
    $stmtDiscente->execute();
}

if ($type == "docente") {
    $sqlDocente = "INSERT INTO \"Usuario_Docente\" (siape, nucleo, curso, id_usuario) VALUES (:siape, :nucleo, :curso, :id_usuario)";
    $stmtDocente = $dbData->connection->prepare($sqlDocente);
    $stmtDocente->bindValue(':siape', $siape);
    $stmtDocente->bindValue(':nucleo', $nucleo);
    $stmtDocente->bindValue(':curso', $course);
    $stmtDocente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
    $stmtDocente->execute();
}

if ($type == "tae") {
    $sqlTae = "INSERT INTO \"Usuario_TAE\" (siape, nucleo, id_usuario) VALUES (:siape, :nucleo, :id_usuario)";
    $stmtTae = $dbData->connection->prepare($sqlTae);
    $stmtTae->bindValue(':siape', $siape);
    $stmtTae->bindValue(':nucleo', $nucleo);
    $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
    $stmtTae->execute();
}

if ($type == "tec_tcc")
{
    $sqlTae = "INSERT INTO \"Usuario_TecAccesibilidade\" (siape, nucleo, id_usuario) VALUES (:siape, :nucleo, :id_usuario)";
    $stmtTae = $dbData->connection->prepare($sqlTae);
    $stmtTae->bindValue(':siape', $siape);
    $stmtTae->bindValue(':nucleo', $nucleo);
    $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
    $stmtTae->execute();
}

$_SESSION['success'] = 'Usuário cadastrado com sucesso';
header("Location: login.php");
exit();
