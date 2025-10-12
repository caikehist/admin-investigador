    <h2>Registrar Usuário</h2>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p>
    <?php endif; ?>

    <?php echo form_open('register/create_user'); ?>

        <label for="name">Nome (username):</label><br>
        <input type="text" name="name" value="<?php echo set_value('name'); ?>"><br>
        <span style="color: red;"><?php echo form_error('name'); ?></span>
        <br>

        <label for="type">Tipo de usuário:</label><br>
        <?php echo form_dropdown('type', $user_types, set_value('type'), 'id="type"'); ?><br>
        <span style="color: red;"><?php echo form_error('type'); ?></span>
        <br>

        <label for="desc">Descrição:</label><br>
        <textarea name="desc"><?php echo set_value('desc'); ?></textarea><br>
        <span style="color: red;"><?php echo form_error('desc'); ?></span>
        <br>

        <label for="password">Senha:</label><br>
        <input type="password" name="password" value=""><br>
        <span style="color: red;"><?php echo form_error('password'); ?></span>
        <br>

        <label for="passconf">Confirmar Senha:</label><br>
        <input type="password" name="passconf" value=""><br>
        <span style="color: red;"><?php echo form_error('passconf'); ?></span>
        <br>
        
        <input type="submit" value="Registrar">

    <?php echo form_close(); ?>

    <p><a href="<?php echo base_url('login'); ?>">Vá para o Login</a></p>
