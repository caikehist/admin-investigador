
    <h1>Lista de Artefatos</h1>
    <a href="<?php echo base_url('artifact/add'); ?>">Adicionar Artefato</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
				<th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($artifacts as $artifact): ?>
            <tr>
                <td><?php echo $artifact->id; ?></td>
                <td><?php echo $artifact->artifact_name; ?></td>
                <td><?php echo $artifact->desc; ?></td>
					<td><?php echo $artifact->type; ?></td>
                <td>
                    <a href="<?php echo base_url('artifact/edit/' . $artifact->id); ?>">Editar</a>
                    <a href="<?php echo base_url('artifact/delete/' . $artifact->id); ?>" onclick="return confirm('Tem certeza?');">Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
