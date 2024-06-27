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

    if ($type == "colaboradores" && (!$cpf))
    {
        $_SESSION['error'] = 'O cpf deve ser preenchido';
        header("Location: UserSignup.html");
        exit();
    }

    if ($type == "discentes" && (!$matricula || !$course))
    {
        $_SESSION['error'] = 'A Matrícula e o Curso devem ser preenchidos';
        header("Location: UserSignup.html");
        exit();
    }

    if ($type == "docentes" && (!$siape || !$course))
    {
        $_SESSION['error'] = 'O Siape e o Curso devem ser preenchidos';
    }

    if (($type == "taes" || $type == "tec_acc") && (!$siape))
    {
        $_SESSION['error'] = 'O Siape deve ser preenchidos';
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

    if ($type == "colaboradores") {
        $sqlColaborador = "INSERT INTO \"colaboradores\" (cpf, id_usuario) VALUES (:cpf, :id_usuario)";
        $stmtColaborador = $dbData->connection->prepare($sqlColaborador);
        $stmtColaborador->bindValue(':cpf', $cpf);
        $stmtColaborador->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtColaborador->execute();
    }

    if ($type == "discentes") {
        $sqlDiscente = "INSERT INTO \"discentes\" (matricula, course, id_usuario) VALUES (:matricula, :course, :id_usuario)";
        $stmtDiscente = $dbData->connection->prepare($sqlDiscente);
        $stmtDiscente->bindValue(':matricula', $matricula);
        $stmtDiscente->bindValue(':course', $course);
        $stmtDiscente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtDiscente->execute();
    }

    if ($type == "docentes") {
        $sqlDocente = "INSERT INTO \"docentes\" (siape, course, id_usuario) VALUES (:siape, :course, :id_usuario)";
        $stmtDocente = $dbData->connection->prepare($sqlDocente);
        $stmtDocente->bindValue(':siape', $siape);
        $stmtDocente->bindValue(':course', $course);
        $stmtDocente->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtDocente->execute();
    }

    if ($type == "taes") {
        $sqlTae = "INSERT INTO \"taes\" (siape, id_usuario) VALUES (:siape, :id_usuario)";
        $stmtTae = $dbData->connection->prepare($sqlTae);
        $stmtTae->bindValue(':siape', $siape);
        $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtTae->execute();
    }

    if ($type == "tec_tcc")
    {
        $sqlTae = "INSERT INTO \"tec_tcc\" (siape, id_usuario) VALUES (:siape, :id_usuario)";
        $stmtTae = $dbData->connection->prepare($sqlTae);
        $stmtTae->bindValue(':siape', $siape);
        $stmtTae->bindValue(':id_usuario', $dbData->connection->lastInsertId());
        $stmtTae->execute();

    }

    $_SESSION['success'] = 'Cadastro realizado com sucesso!';
    header('Location: /index.html');
    exit();
?> 