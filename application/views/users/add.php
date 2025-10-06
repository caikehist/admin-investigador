
    <h1>Adicionar Novo Usuário</h1>
    <form action="<?php echo base_url('user/save'); ?>" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="name" required><br><br>
        <label for="des">Descrição:</label><br>
        <textarea type="text" name="desc" required></textarea><br><br>
			<label for="type">Tipo de Usuário:</label>
			<select id="type" name="type">
			  <option value="PROFESSOR">PROFESSOR</option>
			  <option value="ALUNO">ALUNO</option>
			  <option value="PROFESSOR ORGANIZADOR">PROFESSOR ORGANIZADOR</option>
			  <option value="ALUNO GESTOR">ALUNO GESTOR</option>
			</select>
        <button type="submit">Salvar</button>
    </form>
    <a href="<?php echo base_url('user'); ?>">Voltar</a>
