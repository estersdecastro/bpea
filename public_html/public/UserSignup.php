<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - BPEA</title>

        <style>
            .hidden {
                display: none;
            }
        </style>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="text-center">
            <img src="../assets/images/logo.png" alt="Logo BPEA" width="200px" height="200px">
            <h1>BPEA - UFPA</h1>
            <p>Banco de Dados de Produtos Educacionais Acessíveis - UFPA</p>
            <br><hr>
            
    
        <div class="form-group d-flex justify-content-center">

        <div class="form-group row" >
            <form id ="UserSignupForm" action="/SignupAction.php" method="post">

                <div>
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div>
                    <label for="social_name">Nome Social</label>
                    <input type="text" class="form-control" id="social_name" name="social_name">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                
    <div>
                    <label for="cellphone">Celular</label>
                    <input type="text" class="form-control" id="cellphone" name="cellphone" pattern="[0-9]*" title="Por favor, insira apenas números." value="" required>
                </div>

                <div>
                    <label for="pcd">Pessoa com Deficiência</label>
                    <input type="checkbox" class="form-control" id="pcd" name="pcd">
                </div>

                <div class="col-xs-1-12 hidden">
                    <label for="pcd_type">Tipo</label>
                    <select id="pcd_type" name="pcd_type">
                        <option value="">Selecione o Tipo</option>
                            <option value="deficiencia_visual">Deficiência Visual</option>
                            <option value="deficiencia_auditiva">Deficiência Auditiva</option>
                            <option value="deficiencia_fisica">Deficiência Física</option>
                            <option value="deficiencia_intelectual">Deficiência Intelectual</option>
                            <!-- Adicione mais opções conforme necessário -->
                        </select><br>
                        <script>
                            // Quando o checkbox PCD é marcado, mostra o campo de seleção de tipo PCD
                            document.getElementById('pcd').addEventListener('change', function() {
                                var pcdTypeField = document.querySelector('.hidden');
                                if (this.checked) {
                                    pcdTypeField.style.display = 'block';
                                } else {
                                    pcdTypeField.style.display = 'none';
                                }
                            });
                        </script>
                </div>

                <div>
                    <label for="campus">Campus</label>
                    <input type="text" class="form-control" id="campus" name="campus"required>
                </div>

                <div>
                    <label for="instituto">Núcleo Administrativo</label>
                    <input type="text" class="form-control" id="instituto" name="instituto" required>
                </div>

                <div>
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div>
                    <label for="type">Usuário</label>
                    <select name="type" id="type">
                        <option value=""></option>

                        <option value="colaborador">Colaborador</option>
                        <option value="discente">Discente</option>
                        <option value="docente">Docente</option>
                        <option value="tae">Técnico Administrativos</option>
                        <option value="tec_acc">Técnico em Acessibilidade</option>
                    </select>

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
                                    $("#course").add('required').closest('div').removeClass('hidden');
                                }
                    
                                if (value == 'tae') {
                                    $("#siape").add('required').closest('div').removeClass('hidden');                
                                }
                    
                                if (value == 'tec_acc') {
                                    $("#siape").add('required').closest('div').removeClass('hidden');    
                                }
                            });
                        });
                    </script>
                </script>

                </div>

                <div class="col-xs-1-12 hidden type-depender">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" pattern="[0-9]*" title="Por favor, insira apenas números." value="" required>
                </div>

                <div class="col-xs-1-12 hidden type-depender">
                    <label for="matricula">Matrícula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" pattern="[0-9]*" title="Por favor, insira apenas números." value="" required>
                </div>

                <div class="col-xs-1-12 hidden type-depender">
                    <label for="siape">Siape</label>
                    <input type="text" class="form-control" id="siape" name="siape" pattern="[0-9]*" title="Por favor, insira apenas números." value="" required>
                </div>

                <div class="col-xs-1-12 hidden type-depender">
                    <label for="course">Curso</label>
                    <input type="text" class="form-control" id="course" name="course"required>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>      

    </div>

</body>
    <nav>
        
        <a class="btn btn-primary" href="UserLogin.php">Já tem conta? Faça login</a>
    </nav>
</html>