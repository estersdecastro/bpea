<div class="container">

    <div class="form-group row">
        <form action="function/signup_action.php" method="post">

            <div class="col-xs-1-12">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="col-xs-1-12">
                <label for="social_name">Nome Social</label>
                <input type="text" class="form-control" id="social_name" name="social_name" required>
            </div>

            <div class="col-xs-1-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
<div class="col-xs-1-12">
                <label for="cellphone">Celular</label>
                <input type="text" class="form-control" id="cellphone" name="cellphone" required>
            </div>

            <div class="col-xs-1-12">
                <label for="pcd">PCD</label>
                <input type="checkbox" class="form-control" id="pcd" name="pcd">
            </div>

            <div class="col-xs-1-12 hidden">
                <label for="pcd_type">PCD Tipo</label>
                  <select id="pcd_type" name="pcd_type">
                    <option value="">Selecione o Tipo</option>
                        <option value="deficiencia_visual">Deficiência Visual</option>
                        <option value="deficiencia_auditiva">Deficiência Auditiva</option>
                        <option value="deficiencia_fisica">Deficiência Física</option>
                        <option value="deficiencia_intelectual">Deficiência Intelectual</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select><br>
            </div>

            <div class="col-xs-1-12">
                <label for="campus">Campus</label>
                <input type="text" class="form-control" id="campus" name="campus"required>
            </div>

            <div class="col-xs-1-12">
                <label for="instituto">Instituto</label>
                <input type="text" class="form-control" id="instituto" name="instituto" required>
            </div>

            <div class="col-xs-1-12">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-xs-1-12">
                <label for="type">Tipo</label>
                <select name="type" id="type">
                    <option value=""></option>

                    <option value="gestor">Gestor</option>
                    <option value="colaborador">Colaborador</option>
                    <option value="discente">Discente</option>
                    <option value="docente">Docente</option>
                    <option value="tae">Técnico Administrativos</option>
                    <option value="tec_acc">Técnico em Acessibilidade</option>
                </select>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf"required>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="matricula">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula"required>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="siape">Siape</label>
                <input type="text" class="form-control" id="siape" name="siape"required>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="course">Curso</label>
                <input type="text" class="form-control" id="course" name="course"required>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="nucleo">Núcleo</label>
                <input type="text" class="form-control" id="nucleo" name="nucleo"required>
            </div>

            <div class="col-xs-1-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <div class="form-group row">
        <a href="pages/login.php">Já tem conta? Faça login</a>
    </div>

</div>