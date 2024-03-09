<?php require_once("config.php"); ?>
<?php require_once(__DIR__ . '/header.php'); ?>

<h1>Cadastro</h1>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error']; ?>
    </div>
<?php endif; ?>

<div class="container">

    <div class="form-group row">
        <form action="signup_action.php" method="post">

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
<?php require ('signup_body.php')?>
<script>
    $(document).ready(function () {
        $('#pcd').change((event) => {
            const value = event.target.checked;

            if (value) {
                $('#pcd_type').closest('div').removeClass('hidden')
            } else {
                $('#pcd_type').closest('div').addClass('hidden')
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

<?php require_once(__DIR__ . '/footer.php'); ?>