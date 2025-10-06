<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Adicionar Artefato</h1>
    </div>
    <div class="card-body">
        <span class="text-danger">Atribuir integrantes a grupos</span>
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('artifact/save'); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="artifact_name" class="form-label">Nome do Artefato:</label>
                <input type="text" class="form-control" name="artifact_name" required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea class="form-control" name="desc" rows="3" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="registry_date" class="form-label">Registrado em:</label>
                <input type="date" class="form-control" name="registry_date" required>
            </div>

            <div class="mb-3">
                <label for="registered_by" class="form-label">Registrado por:</label>
                <input type="text" class="form-control" name="registered_by" required>
            </div>

            <div class="mb-3">
                <label for="collected_date" class="form-label">Coletado em:</label>
                <input type="date" class="form-control" name="collected_date" required>
            </div>

            <div class="mb-3">
                <label for="collected_by" class="form-label">Coletado por:</label>
                <select name="collected_by" class="form-select" required>
                    <?php foreach($users as $u):?>
                        <option value="<?php echo $u->id;?>"><?php echo $u->name . ' - ' . $u->type;?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo de Artefato:</label>
                <select id="type" name="type" class="form-select" required>
                  <option value="VÍDEO">VÍDEO</option>
                  <option value="ÁUDIO">ÁUDIO</option>
                  <option value="TEXTO">TEXTO</option>
                  <option value="IMAGEM">IMAGEM</option>
                  <option value="FOTOGRAFIA">FOTOGRAFIA</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="artifact_file" class="form-label">Arquivo do Artefato:</label>
                <input type="file" class="form-control" name="artifact_file" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <div class="card-footer text-end">
        <a href="<?php echo base_url('artifact'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>