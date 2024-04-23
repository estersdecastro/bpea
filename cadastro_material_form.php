
<h2>Formulário de Cadastro</h2><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" value=""><br> 

    <label for="keyword">Palavra-Chave</label>
    <input type="text" id="keyword" name="keyword" value=""><br>

    <label for="ano">Ano</label>
    <input type="text" id="ano" name="ano" value=""><br>

    <label for="formato">Format o</label>
      <select id="formato" name="formato">
          <option value="">Selecione o Formato</option>
          <option value="audio">Áudio</option>
          <option value="video">Vídeo</option>
          <option value="imagem">Imagem</option>
          <option value="documento">Documento</option>
          <option value="audio_desc">Áudiodescrição
          </option>
          <option value="libras">Libras</option>
          <option value="braille">Braille</option>
    </option>
          <option value="tatil">Tátil</option>
          <!-- Adicione mais opções conforme necessário -->
      </select><br>


    <label for="curso">Curso</label>
    <input type="text" id="curso" name="curso" value=""><br>

    <label for="disciplina">Disciplina</label>
    <input type="text" id="disciplina" name="disciplina" value=""><br>
    
    <label for="tipo">Tipo</label>
    <input type="text" id="tipo" name="tipo" value=""><br>

    <label for="tipo_de_deficiencia">Tipo de Deficiência</label>
    <select id="tipo_de_deficiencia" name="tipo_de_deficiencia">
        <option value="">Selecione o Tipo de Deficiência</option>
        <option value="deficiencia_visual">Deficiência Visual</option>
        <option value="deficiencia_auditiva">Deficiência Auditiva</option>
        <option value="deficiencia_fisica">Deficiência Física</option>
        <option value="deficiencia_intelectual">Deficiência Intelectual</option>
        <!-- Adicione mais opções conforme necessário -->
    </select><br>

    <label for="id_categoria">ID da Categoria</label>
    <select id="id_categoria" name="id_categoria">
        <option value="">Selecione a Categorias</option>
        <?php foreach($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>"><?= $categoria['nome']; ?></option>
            
        <?php endforeach; ?>
        <!-- Adicione mais opções conforme necessário -->
    </select><br>
    
    <label for="local">Upload</label>
    <input type="file" id="local" name="local" value=""><br>

    <label for="uso">Uso</label>
    <input type="text" id="uso" name="uso" value=""><br>

    <label for="fonte_original">Fonte Original</label>
    <input type="text" id="fonte_original" name="fonte_original" value=""><br>

    <label for="cid_pcd">CID PCD</label>
    <input type="text" id="cid_pcd" name="cid_pcd" value=""><br>

    <label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao"></textarea><br>

    <br><input type="submit" value="Cadastrar">
</form>
