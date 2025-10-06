<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Editar Projeto</h1>
    </div>
    <div class="card-body">
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('project/update'); ?>" method="post">
            
            <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
            <input type="hidden" name="project_id" value="<?= $data['project']->id ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Título do Projeto:</label>
                <input type="text" class="form-control" name="name" value="<?= $data['project']->name?>" required>
            </div>

            <div class="mb-3">
                <label for="institution" class="form-label">Instituição:</label>
                <input type="text" class="form-control" name="institution" value="<?= $data['project']->institution?>" required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea class="form-control" name="desc" rows="3" required><?= $data['project']->desc?></textarea>
            </div>

            <div class="mb-3">
                <label for="search_user" class="form-label">Buscar Usuário:</label>
                <div class="input-group">
                    <input type="text" id="search_user" class="form-control" placeholder="Digite o nome do usuário...">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                
                <div id="search_results" class="list-group mt-2" style="max-height: 200px; overflow-y: auto;"></div>

                <label class="form-label mt-3">Membros da Equipe:</label>

                <ul id="team_members" class="list-group"></ul>

                <input type="hidden" name="team_ids" id="team_ids" value="">
            </div>
            
            <div class="mb-3">
                <label for="begin_at" class="form-label">Iniciará em:</label>
                <input type="date" class="form-control" name="begin_at" value="<?= $data['project']->begin_at?>" required>
            </div>

            <div class="mb-3">
                <label for="final_preview" class="form-label">Previsão de Conclusão:</label>
                <input type="date" class="form-control" name="final_preview" value="<?= $data['project']->final_preview?>" required>
            </div>

            <div class="mb-3">
                <label for="final_real" class="form-label">Data de Conclusão (Real):</label>
                <input type="date" class="form-control" name="final_real" value="<?= $data['project']->final_real?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <div class="card-body">
        <h3>Missões do Projeto</h3>
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
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($missions as $mission): ?>
                        <?php if($mission->status !== 'FINALIZADA'):?>
                        <tr>
                            <td><?php echo $mission->id; ?></td>
                            <td><?php echo $mission->name; ?></td>
                            <td><?php echo $mission->status; ?></td>
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
                        <?php endif;?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <div class="card-footer text-end">
        <a href="<?php echo base_url('controller'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>

<script>
$(document).ready(function() {
    console.log(<?php echo json_encode(isset($team_members) ? $team_members : []); ?>);
    // ----------------------------------------------------
    // Lógica para carregar os membros existentes na edição
    // ----------------------------------------------------
    const initialMembers = <?php echo json_encode(isset($data['team_members']) ? $data['team_members'] : []); ?>;
    let teamIdsInput = $('#team_ids');
    let teamMembersList = $('#team_members');
    
    // Converte os dados do PHP para JavaScript e preenche o "carrinho"
    let initialIds = [];
    $.each(initialMembers, function(index, member) {
        teamMembersList.append(
            `<li class="list-group-item d-flex justify-content-between align-items-center" data-user-id="${member.id}">
                ${member.name} - ${member.type}
                <button type="button" class="btn-close remove-member" aria-label="Remover"></button>
            </li>`
        );
        initialIds.push(member.id);
    });
    
    // Define o valor inicial do campo oculto
    teamIdsInput.val(initialIds.join(','));


    // ----------------------------------------------------
    // Lógica de busca de usuários via AJAX
    // ----------------------------------------------------
    $('#search_user').keyup(function() {
        let searchTerm = $(this).val();
        let searchResults = $('#search_results');

        searchResults.empty();

        if (searchTerm.length > 2) {
            $.ajax({
                url: "<?php echo base_url('ajax/search_users'); ?>",
                method: "POST",
                data: { search_term: searchTerm },
                dataType: "json",
                success: function(response) {
                    if (response.length > 0) {
                        $.each(response, function(index, user) {
                            searchResults.append(
                                `<a href="#" class="list-group-item list-group-item-action" data-user-id="${user.id}" data-user-name="${user.name}">
                                    ${user.name}
                                </a>`
                            );
                        });
                    } else {
                        searchResults.append('<div class="list-group-item">Nenhum usuário encontrado.</div>');
                    }
                }
            });
        }
    });

    // ----------------------------------------------------
    // Lógica de "adicionar ao carrinho"
    // ----------------------------------------------------
    $(document).on('click', '#search_results .list-group-item', function(e) {
        e.preventDefault();

        let userId = $(this).data('user-id');
        let userName = $(this).data('user-name');
        let teamMembers = $('#team_members');
        let teamIdsInput = $('#team_ids');
        
        let selectedIds = teamIdsInput.val().split(',').filter(Boolean);

        // Evita adicionar o mesmo usuário duas vezes
        if (selectedIds.includes(String(userId))) {
            return;
        }

        // Adiciona o usuário à lista visual da equipe
        teamMembers.append(
            `<li class="list-group-item d-flex justify-content-between align-items-center" data-user-id="${userId}">
                ${userName}
                <button type="button" class="btn-close remove-member" aria-label="Remover"></button>
            </li>`
        );

        // Adiciona o ID ao campo oculto
        selectedIds.push(userId);
        teamIdsInput.val(selectedIds.join(','));

        // Limpa os resultados da busca
        $('#search_user').val('');
        $('#search_results').empty();
    });

    // ----------------------------------------------------
    // Lógica de "remover do carrinho"
    // ----------------------------------------------------
    $(document).on('click', '.remove-member', function() {
        let listItem = $(this).closest('li');
        let userId = listItem.data('user-id');
        let teamIdsInput = $('#team_ids');

        // Remove o ID do campo oculto
        let selectedIds = teamIdsInput.val().split(',').filter(Boolean);
        let newIds = selectedIds.filter(id => id != userId);
        teamIdsInput.val(newIds.join(','));

        // Remove o item da lista visual
        listItem.remove();
    });
});
</script>