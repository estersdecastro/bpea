<?php 
    include 'config.php';
    $dbData = new stdClass();
    $dbData->connection = $pdo; 

    $name = filter_input(INPUT_POST, 'name');
    $social_name = filter_input(INPUT_POST, 'social_name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cellphone = filter_input(INPUT_POST, 'cellphone');
    $pcd = isset($_POST['pcd']) && $_POST['pcd'] === 'on' ?  1 : 0;
    $pcd_type = filter_input(INPUT_POST, 'pcd_type');
    $campus = filter_input(INPUT_POST, 'campus');
    $instituto = filter_input(INPUT_POST, 'instituto');
    $password = filter_input(INPUT_POST, 'password');
    $type = filter_input(INPUT_POST, 'type');

    if (!$name)
    {
        $_SESSION['error'] = 'O Nome deve ser preenchido';
        header("Location: UserSignup.html");
        exit();
    }


    if (!$email)
    {
        $_SESSION['error'] = 'O email deve ser preenchido';
        header("Location: UserSignup.html");
        exit();
    }

    if (!$cellphone)
    {
        $_SESSION['error'] = 'O Celular deve ser preenchido';
        header("Location: UserSignup.html");
        exit();
    }


    if (!$password)
    {
        $_SESSION['error'] = 'A Senha deve ser preenchida';
        header("Location: UserSignup.html");
        exit();
    }

    if (!$type)
    {
        $_SESSION['error'] = 'Declare o seu tipo de usuário';
        header("Location: UserSignup.html");
        exit();
    }

    $cpf = filter_input(INPUT_POST, 'cpf');
    $matricula = filter_input(INPUT_POST, 'matricula');
    $siape = filter_input(INPUT_POST, 'siape');
    $course = filter_input(INPUT_POST, 'course');
    $nucleo = filter_input(INPUT_POST, 'nucleo');

    if ($type != "colaborador" && $type != "discente" && $type != "docente" && $type != "tae" && $type != "tec_acc") {
        $_SESSION['error'] = 'Tipo inválido';
        header("Location: UserSignup.html");
        exit();
    }

    if ($type == "colaborador" && (!$cpf))
    {
        $_SESSION['error'] = 'O cpf deve ser preenchido';
        header("Location: UserSignup.html");
        exit();
    }

    if ($type == "discente" && (!$matricula || !$course))
    {
        $_SESSION['error'] = 'A Matrícula e o Curso devem ser preenchidos';
        header("Location: UserSignup.html");
        exit();
    }

    if ($type == "docente" && (!$siape || !$nucleo || !$course))
    {
        $_SESSION['error'] = 'O Siape, o Núcleo e o Curso devem ser preenchidos';
    }

    if (($type == "tae" || $type == "tec_acc") && (!$siape || !$nucleo))
    {
        $_SESSION['error'] = 'O Siape e o Núcleo devem ser preenchidos';
        header("Location: UserSignup.html");
        exit();
    }


    $sqlUser = "SELECT * FROM usuario WHERE email = :email";
    $stmtUser = $dbData->connection->prepare($sqlUser);
    $stmtUser->bindValue(':email', $email);

    if ($stmtUser->rowCount() > 0) {
        $_SESSION['error'] = 'E-mail já cadastrado';
        header("Location: UserSignup.html");
        exit;
    }

    $sql = "INSERT INTO usuario (name, social_name, email, cellphone, pcd, pcd_type, campus, instituto, password, type) VALUES (:name, :social_name, :email, :cellphone, :pcd, :pcd_type, :campus, :instituto, :password, :type)";
    $stmt = $dbData->connection->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':social_name', $social_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':cellphone', $cellphone);
    $stmt->bindValue(':pcd', $pcd);
    $stmt->bindValue(':pcd_type', $pcd_type);
    $stmt->bindValue(':campus', $campus);
    $stmt->bindValue(':instituto', $instituto);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindValue(':type', $type);
    $stmt->execute();

    $lastInsertId = $dbData->connection->lastInsertId();

    if ($type == "colaborador") {
        $sqlColaborador = "INSERT INTO \"colaborador\" (cpf, id_usuario) VALUES (:cpf, :id_usuario)";
        $stmtColaborador = $dbData->connection->prepare($sqlColaborador);
        $stmtColaborador->bindValue(':cpf', $cpf);
        $stmtColaborador->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtColaborador->execute();
    }

    if ($type == "discente") {
        $sqlDiscente = "INSERT INTO \"discente\" (matricula, course, id_usuario) VALUES (:matricula, :course, :id_usuario)";
        $stmtDiscente = $dbData->connection->prepare($sqlDiscente);
        $stmtDiscente->bindValue(':matricula', $matricula);
        $stmtDiscente->bindValue(':course', $course);
        $stmtDiscente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtDiscente->execute();
    }

    if ($type == "docente") {
        $sqlDocente = "INSERT INTO \"docente\" (siape, nucleo, course, id_usuario) VALUES (:siape, :nucleo, :course, :id_usuario)";
        $stmtDocente = $dbData->connection->prepare($sqlDocente);
        $stmtDocente->bindValue(':siape', $siape);
        $stmtDocente->bindValue(':nucleo', $nucleo);
        $stmtDocente->bindValue(':course', $course);
        $stmtDocente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtDocente->execute();
    }

    if ($type == "tae") {
        $sqlTae = "INSERT INTO \"tae\" (siape, nucleo, id_usuario) VALUES (:siape, :nucleo, :id_usuario)";
        $stmtTae = $dbData->connection->prepare($sqlTae);
        $stmtTae->bindValue(':siape', $siape);
        $stmtTae->bindValue(':nucleo', $nucleo);
        $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtTae->execute();
    }

    if ($type == "tec_tcc")
    {
        $sqlTae = "INSERT INTO \"tec_tcc\" (siape, nucleo, id_usuario) VALUES (:siape, :nucleo, :id_usuario)";
        $stmtTae = $dbData->connection->prepare($sqlTae);
        $stmtTae->bindValue(':siape', $siape);
        $stmtTae->bindValue(':nucleo', $nucleo);
        $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtTae->execute();

    }

    $_SESSION['success'] = 'Cadastro realizado com sucesso!';
    header('Location: /index.html');
    exit();
?> 