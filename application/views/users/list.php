
    <h1>Lista de Usuários</h1>
    <a href="<?php echo base_url('user/add'); ?>">Adicionar Novo Usuário</a>
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
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->desc; ?></td>
					<td><?php echo $user->type; ?></td>
                <td>
                    <a href="<?php echo base_url('user/edit/' . $user->id); ?>">Editar</a>
                    <a href="<?php echo base_url('user/delete/' . $user->id); ?>" onclick="return confirm('Tem certeza?');">Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
