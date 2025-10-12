<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="card-title h3 mb-0">Lista de Artefatos</h1>
        <a href="<?php echo base_url('artifact/add'); ?>" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i> Adicionar Artefato
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($data['artifacts'])): ?>
            <div class="alert alert-info" role="alert">
                Nenhum Artefato encontrado.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['artifacts'] as $artifact): ?>
                        <tr>
                            <td><?php echo $artifact->id; ?></td>
                            <td><?php echo $artifact->name; ?></td>
                            <td><?php echo $artifact->desc; ?></td>
                            <td><?php echo $artifact->type; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('artifact/edit/' . $artifact->id); ?>" class="btn btn-sm btn-warning">
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



   