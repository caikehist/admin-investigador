<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h1 class="card-title h3 mb-0">Adicionar Missão</h1>
    </div>
    <div class="card-body">
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('mission/save'); ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
			    <label for="name" class="form-label">Selecione uma opção:</label>
			    <select id="name" class="form-select" id="name" name="name">
			    	<option></option>
			        <option value="MISSÃO 1: DESVENDANDO O PASSADO">MISSÃO 1: DESVENDANDO O PASSADO</option>
			        <option value="MISSÃO 2: CAÇADORES DE MEMÓRIA">MISSÃO 2: CAÇADORES DE MEMÓRIA</option>
			        <option value="MISSÃO 3: GUARDIÕES DO CONHECIMENTO">MISSÃO 3: GUARDIÕES DO CONHECIMENTO</option>
			        <option value="MISSÃO 4: O CAÇADOR DE DETALHES">MISSÃO 4: O CAÇADOR DE DETALHES</option>
			        <option value="MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO">MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO</option>
			        <option value="MISSÃO 6: A RECEITA DE FAMÍLIA">MISSÃO 6: A RECEITA DE FAMÍLIA</option>
			    </select>
			</div>            

            <div class="mb-3">
                <label for="desc" class="form-label">Descrição:</label>
                <textarea style="height: 500px" id="desc" class="form-control" name="desc" rows="3" disabled></textarea>
            </div>
            
            <div class="mb-3">
                <label for="begin_at" class="form-label">Iniciará em:</label>
                <input id="begin_at" type="date" class="form-control" name="begin_at" required>
            </div>

            <div class="mb-3">
                <label for="final_preview" class="form-label">Previsão de Encerramento:</label>
                <input id="final_preview" type="date" class="form-control" name="final_preview" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <div class="card-footer text-end">
        <a href="<?php echo base_url('mission'); ?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>

<script>
$(document).ready(function() {

    // O código da requisição AJAX pode continuar aqui
    $('#name').change(function() {
    	let missionName = $(this).val();
        // Objeto com os dados que você quer enviar para o servidor
        var dados = {
            'name': missionName,
        };

        $.ajax({
            url: "<?php echo base_url('ajax/get_mission_by_name'); ?>",
            method: 'GET',
            data: dados,
            dataType: 'json',
            
            success: function(response) {
                console.log('Resposta do servidor:', response);

                if(response.status === 'success') {
                    response.mission_id;
                    response.name;
                	$('#desc').val(response.desc);
                	response.begin_at;
                	response.final_preview;
                	response.final_real;
                } else {
                    alert('Erro! Resposta: ' + response.message);
                }
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Erro na requisição:', textStatus, errorThrown);
                alert('Ocorreu um erro ao tentar se comunicar com o servidor.');
            }
        });
    });
});
</script>