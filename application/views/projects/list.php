<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title h3 mb-0">Lista de Projetos</h1>
        <a href="<?php echo base_url('project/add'); ?>" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Adicionar Projeto
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($data['projects'])): ?>
            <div class="alert alert-info" role="alert">
                Nenhum projeto encontrado.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Encerra em</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['projects'] as $project): ?>
                        <tr>
                            <td><?php echo $project->id; ?></td>
                            <td><?php echo $project->name; ?></td>
                            <td><?php echo $project->desc; ?></td>
                            <td><?php echo $project->final_preview; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('project/edit/' . $project->id); ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
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