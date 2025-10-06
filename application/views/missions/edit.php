<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Editar Artefato</h1>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('artifact/update/'.$artifact->id); ?>" method="post">
            
            <div class="mb-3">
                <p>
                    <a href="<?= base_url($artifact->artifact_path);?>" target="_blank" class="btn btn-info">
                        <i class="fas fa-file-alt me-2"></i> Abrir Artefato
                    </a>
                </p>
                <small class="text-muted"><?= base_url($artifact->artifact_path);?></small>
            </div>

            <div class="mb-3">
                <label for="artifact_name" class="form-label">Nome do Artefato:</label>
                <input type="text" class="form-control" name="artifact_name" value="<?=$artifact->artifact_name?>" required>
            </div>
            
            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea class="form-control" name="desc" rows="3"><?= isset($artifact->desc) ? $artifact->desc : ''?></textarea>
            </div>

            <div class="mb-3">
                <label for="registry_date" class="form-label">Registrado em:</label>
                <input type="date" class="form-control" name="registry_date" value="<?=$artifact->registry_date?>" required>
            </div>

            <div class="mb-3">
                <label for="registered_by" class="form-label">Registrado por:</label>
                <input type="text" class="form-control" name="registered_by" value="<?=$artifact->registered_by?>" required>
            </div>

            <div class="mb-3">
                <label for="collected_date" class="form-label">Coletado em:</label>
                <input type="date" class="form-control" name="collected_date" value="<?=$artifact->collected_date?>" required>
            </div>

            <div class="mb-3">
                <label for="collected_by" class="form-label">Coletado por:</label>
                <p class="form-control-plaintext"><?= $user->name . ' - ' . $user->type;?></p>
            </div>
            
            <div class="mb-3">
                <label for="type" class="form-label">Tipo de Artefato:</label>
                <p class="form-control-plaintext"><?=$artifact->type?></p>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
    <div class="card-footer text-end">
        <a href="<?php echo base_url('artifact'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>