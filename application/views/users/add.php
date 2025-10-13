<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Novo Usuário</h1>
    </div>
    <div class="card-body">
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('user/save'); ?>" method="post">
            
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea class="form-control" name="desc" rows="3" ></textarea>
            </div>
                    
            <label for="type">Tipo de Usuário:</label>
            <select id="type" class="form-select" name="type">
              <option value="PROFESSOR COLABORADOR">PROFESSOR COLABORADOR</option>
              <option value="PROFESSOR ORGANIZADOR">PROFESSOR ORGANIZADOR</option>
              <option value="ALUNO">ALUNO</option>              
              <option value="ALUNO COLABORADOR">ALUNO COLABORADOR</option>
            </select>         
            <br><br>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <div class="card-footer text-end">
        <a href="<?php echo base_url('controller'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>
    