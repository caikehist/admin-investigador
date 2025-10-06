
        <h1>Adicionar Novo Artefato</h1>
        <form action="<?php echo base_url('artifact/update/'.$artifact->id); ?>" method="post">
            <a href="<?= base_url($artifact->artifact_path);?>" target="_blank">Abrir</a><br>
            <?= base_url($artifact->artifact_path);?><br>
            <label for="nome">Nome:</label><br>
            <input type="text" name="artifact_name" value="<?=$artifact->artifact_name?>"><br><br>
            
            <label for="desc">Descrição:</label><br>
            <textarea name="desc"><?= isset($artifact->desc) ? $artifact->desc : ''?></textarea><br><br>

            <label for="nome">Registrado em:</label><br>
            <input type="date" name="registry_date" value="<?=$artifact->registry_date?>"><br><br>

            <label for="nome">Registrado por:</label><br>
            <input type="text" name="registered_by" value="<?=$artifact->registered_by?>"><br><br>

            <label for="nome">Coletado em:</label><br>
            <input type="date" name="collected_date" value="<?=$artifact->collected_date?>"><br><br>

            <label for="nome">Coletado por:</label>
            <span><?= $user->name . ' - ' . $user->type;?></span><br><br>

            
            <label for="type">Tipo de Artefato:</label>
            <span><?=$artifact->type?></span><br><br>
            <button type="submit">Salvar</button>
        </form>
        
        <a href="<?php echo base_url('artifact'); ?>">Voltar</a>
