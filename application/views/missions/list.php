<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title h3 mb-0">Lista de Missões</h1>
        <a href="<?php echo base_url('mission/add'); ?>" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Adicionar Missão
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($missions)): ?>
            <div class="alert alert-info" role="alert">
                Nenhuma missão encontrada.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Projeto</th>
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($missions as $mission): ?>
                        <tr>
                            <td><?php echo $mission->id; ?></td>
                            <td><?php echo $mission->name; ?></td>
                            <td><?php echo $mission->status; ?></td>
                            <td><?php echo $mission->project_name;?></td>
                            <td><?php echo $mission->desc; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('mission/edit/' . $mission->id); ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url('mission/delete/' . $mission->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>