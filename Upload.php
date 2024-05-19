<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Material - BPEA</title>

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
        <?php
    
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        
        <div class="text-center">
            <br>
            <img src="/logo.png" alt="Logo BPEA" width="200" height="200"><br>
            <br>
            <h1>BPEA - UFPA</h1>
            <p>Banco de Dados de Produtos Educacionais Acessíveis - UFPA</p>
            <br><br>
            <h2>Formulário de Cadastro</h2><br>

            <div class="form-group d-flex justify-content-center">
                
    
                
                <form method="post" action="/UploadAction.php" enctype="multipart/form-data">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" value=""> <br>
                
                    <label for="keyword">Palavra-Chave</label>
                    <input type="text" id="keyword" name="keyword" value=""><br>
                
                    <label for="ano">Ano</label>
                    <input type="text" id="ano" name="ano" pattern="[0-9]*" title="Por favor, insira apenas números." value=""><br>
    
                    <label for="id_categoria">Àrea de Conhecimento</label>
                    <select id="id_categoria" name="id_categoria">
                        <option value="">Selecione</option>
                        <option value="1">Ciências Exatas e da Terra</option>
                        <option value="2">Ciências Biológicas</option>
                        <option value="3">Tecnologia/Engenharias</option>
                        <option value="4">Ciências da Saúde</option>
                        <option value="5">Ciências Agrárias</option>
                        <option value="6">Ciências Sociais Aplicadas</option>
                        <option value="7">Ciências Humanas</option>
                        <option value="8">Linguística, Letras e Artes</option>
                        <option value="9">Documentos</option>
                        <option value="10">Informativo</option>
                        <option value="10">Outra</option>
                    </select><br>
                
                    <label for="formato">Formato</label>
                      <select id="formato" name="formato">
                          <option value="">Selecione o Formato</option>
                          <option value="audio">Áudio</option>
                          <option value="video">Vídeo</option>
                          <option value="imagem">Imagem</option>
                          <option value="documento">Documento</option>
                          <option value="extensao">Outros</option>
                      </select><br>
    
                    <label for="acc_resources">Recurso de Acessibilidade</label>
                    <select id="acc_resources" name="acc_resources">
                        <option value="">Selecione o Recurso de Acessibilidade</option>
                        <option value="libras">Libras</option>
                        <option value="lingua_de_sinais_estrangeira">Língua de Sinais Estrangeira</option>
                        <option value="braile">Braile</option>
                        <option value="legenda">Legenda</option>
                        <option value="audiodescricao">Audiodescrição</option>
                        <option value="janela_de_libras">Janela de Libras</option>
                        <option value="traducao_simultanea">Tradução Simultânea</option>
                        <option value="tatil">Tátil</option>
                        <option value="lingua_de_sinais_estrangeira">Língua de Sinais Estrangeira</option>
                        <option value="outro">Outros</option>
                    </select><br>
                
                    <label for="tipo_de_deficiencia">Tipo de Deficiência</label>
                    <select id="tipo_de_deficiencia" name="tipo_de_deficiencia">
                        <option value="">Selecione o Tipo de Deficiência</option>
                        <option value="deficiencia_visual">Deficiência Visual</option>
                        <option value="deficiencia_auditiva">Deficiência Auditiva</option>
                        <option value="deficiencia_fisica">Deficiência Física</option>
                        <option value="deficiencia_intelectual">Deficiência Intelectual</option>
                        <option value="deficiencia_motor">Outras</option>
                    </select><br>
                                
                    <label for="uso">Uso</label>
                    <select id="uso" name="uso">
                        <option value="">Selecione o Uso</option>
                        <option value="ensino">Individual</option>
                        <option value="pesquisa">Grupo</option>
                        <option value="extensao">Outros</option>
    
                    </select><br>
                
                    <label for="local">Upload</label>
                    <input type="file" id="local" name="local" value=""><br>
    
                    <label for="fonte_original">Fonte Original</label>
                    <input type="text" id="fonte_original" name="fonte_original" value=""><br>
                
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao"></textarea><br>
                    
                    <br><button type="submit" class="btn btn-info">Cadastrar</button><br>
                </form>
            </div>
            

            <br><br>



            <a href="/Dashboard.html" class="btn btn-primary">Retornar ao Início</a>
            <a href="/pesquisa.php" class="btn btn-primary">Consultar Material</a>
            <a href="/index.php" class="btn btn-danger">Sair</a>   
        </div>
    </body>
</html>