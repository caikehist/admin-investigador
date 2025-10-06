<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Adicionar Novo Registro</h1>
    </div>
    <div class="card-body">
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('controller/save'); ?>" method="post">
            
            <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea class="form-control" name="desc" rows="3" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="begin_at" class="form-label">Iniciará em:</label>
                <input type="date" class="form-control" name="begin_at" required>
            </div>

            <div class="mb-3">
                <label for="final_preview" class="form-label">Previsão de Fim:</label>
                <input type="date" class="form-control" name="final_preview" required>
            </div>

            <div class="mb-3">
                <label for="final_real" class="form-label">Data de Conclusão (Real):</label>
                <input type="date" class="form-control" name="final_real">
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <div class="card-footer text-end">
        <a href="<?php echo base_url('controller'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>