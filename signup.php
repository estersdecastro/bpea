<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<h1>Cadastro</h1>

<?php 
    if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error']; ?>
    </div>
    <?php endif; 
?>

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

<?php include 'footer.php' ?>