
    <h1>Adicionar Artefato</h1>
    <?php isset($error) ? $error : '';?>
    <form action="<?php echo base_url('artifact/save'); ?>" method="post" enctype="multipart/form-data">
        <label for="artifact_name">Nome do Artefato:</label><br>
        <input type="text" name="artifact_name" ><br><br>

        <label for="desc">Descrição:</label><br>
        <textarea name="desc"></textarea><br><br>
        
        <label for="registry_date">Registrado em:</label><br>
        <input type="date" name="registry_date" ><br><br>

        <label for="registered_by">Registrado por:</label><br>
        <input type="text" name="registered_by" ><br><br>

        <label for="collected_date">Coletado em:</label><br>
        <input type="date" name="collected_date" ><br><br>

        <label for="collected_by">Coletado por:</label><br>

        <select name="collected_by">
            <?php foreach($users as $u):?>
                
                <option value="<?php echo $u->id;?>"><?php echo $u->name . ' - ' . $u->type;?></option>
            <?php endforeach;?>
        </select><br><br>


        <label for="type">Tipo de Artefato:</label>
            <select id="type" name="type">
              <option value="VÍDEO">VÍDEO</option>
              <option value="ÁUDIO">ÁUDIO</option>
              <option value="TEXTO">TEXTO</option>
              <option value="IMAGEM">IMAGEM</option>
              <option value="FOTOGRAFIA">FOTOGRAFIA</option>
            </select>
            <br><br>
        <!-- O novo campo para o upload do arquivo -->
        <label for="artifact_file">Arquivo do Artefato:</label><br>
        <input type="file" name="artifact_file" required><br><br>
        <button type="submit">Salvar</button>
    </form>
    
            
            
        
    <a href="<?php echo base_url('artifact'); ?>">Voltar</a>
