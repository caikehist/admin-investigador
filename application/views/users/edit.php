
    <h1>Editar Usuário</h1>
    <form action="<?php echo base_url('user/update/' . $user->id); ?>" method="post">
        <label for="name">Nome:</label><br>
        <input type="text" name="name" value="<?php echo $user->name; ?>" required><br><br>
		<label for="desc">Descrição:</label><br>
        <textarea name="desc" required><?php echo $user->desc; ?></textarea><br><br>
        <label for="type">Tipo de Usuário:</label>
			<select id="type" name="type">
			  <option value="PROFESSOR" <?= $user->type == "PROFESSOR"? "selected" : ''?>>PROFESSOR</option>
			  <option value="ALUNO" <?= $user->type == "ALUNO"? "selected" : ''?>>ALUNO</option>
			  <option value="PROFESSOR ORGANIZADOR" <?= $user->type == "PROFESSOR ORGANIZADOR"? "selected" : ''?>>PROFESSOR ORGANIZADOR</option>
			  <option value="ALUNO GESTOR" <?= $user->type == "ALUNO GESTOR"? "selected" : ''?>>ALUNO GESTOR</option>
			</select>
        <button type="submit">Atualizar</button>
    </form>
    <a href="<?php echo base_url('user'); ?>">Voltar</a>
