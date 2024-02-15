<?php require_once("config.php"); ?>
<?php require_once("header.html"); ?>

<h1>Cadastro</h1>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error']; ?>
    </div>
<?php endif; ?>

<div class="container">

    <div class="form-group row">
        <form action="signup_action.php" method="post">
            <!--
                - Nome
                - Nome Social
                - Email
                - Celular
                - PCD
                - PCD Tipo
                - Campus
                - Instituto
                - Tipo Login
                - Senha

                - Tipo Login: Colaborador, Discente, Docente, TAE, Técnico em Acessibilidade

                - Colaborador:
                    - CPF

                - Discente:
                    - Matrícula
                    - Curso

                - Docente:
                    - Siape
                    - Curso
                    - Núcleo

                - TAE:
                    - CPF

                - Docente:
                    - Siape
                    - Núcleo
            -->

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
                <input type="checkbox" class="form-control" id="pcd" name="pcd" required>
            </div>

            <div class="col-xs-1-12 hidden">
                <label for="pcd_type">PCD Tipo</label>
                <input type="text" class="form-control" id="pcd_type" name="pcd_type">
            </div>

            <div class="col-xs-1-12">
                <label for="campus">Campus</label>
                <input type="text" class="form-control" id="campus" name="campus" required>
            </div>

            <div class="col-xs-1-12">
                <label for="instituto">Instituto</label>
                <input type="text" class="form-control" id="instituto" name="instituto" required>
            </div>

            <div class="col-xs-1-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-xs-1-12">
                <label for="type">Tipo</label>
                <select name="type" id="type">
                    <option value=""></option>

                    <option value="colaborador">Colaborador</option>
                    <option value="discente">Discente</option>
                    <option value="docente">Docente</option>
                    <option value="tae">TAE</option>
                    <option value="tec_acc">Técnico em Acessibilidade</option>
                </select>
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="matricula">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula">
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="siape">Siape</label>
                <input type="text" class="form-control" id="siape" name="siape">
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="course">Curso</label>
                <input type="text" class="form-control" id="course" name="course">
            </div>

            <div class="col-xs-1-12 hidden type-depender">
                <label for="nucleo">Núcleo</label>
                <input type="text" class="form-control" id="nucleo" name="nucleo">
            </div>

            <div class="col-xs-1-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <div class="form-group row">
        <a href="signup.php">Já tem conta? Faça login</a>
    </div>
        
</div>

<script>
    $(document).ready(function () {
        $('#pcd').change((event) => {
            const value = event.target.checked;

            if (value) {
                $('#pcd_type').add('required').closest('div').removeClass('hidden')
            } else {
                $('#pcd_type').removeAttr('required').closest('div').addClass('hidden')
            }
        });

        $("#type").change(event => {
            const value = event.target.value;

            $('.type-depender').addClass('hidden');
            $('.type-depender input').removeAttr('required');

            if (value == 'colaborador') {
                $("#cpf").add('required').closest('div').removeClass('hidden');
            }

            if (value == 'discente') {
                $("#matricula").add('required').closest('div').removeClass('hidden');
                $("#course").add('required').closest('div').removeClass('hidden');
            }

            if (value == 'docente') {
                $("#siape").add('required').closest('div').removeClass('hidden');
                $("#nucleo").add('required').closest('div').removeClass('hidden');
                $("#course").add('required').closest('div').removeClass('hidden');
            }

            if (value == 'tae') {
                $("#siape").add('required').closest('div').removeClass('hidden');
                $("#nucleo").add('required').closest('div').removeClass('hidden');                
            }

            if (value == 'tec_acc') {
                $("#siape").add('required').closest('div').removeClass('hidden');
                $("#nucleo").add('required').closest('div').removeClass('hidden');    
            }
        });
    });
</script>

<?php require_once("footer.html"); ?>