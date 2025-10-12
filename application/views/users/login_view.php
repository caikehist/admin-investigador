
	<h2>Login</h2>

	<?php if($this->session->flashdata('error_msg')):?>
		<p style="color:red;"><?php echo $this->session->flashdata('error_msg');?></p>
	<?php endif;?>

	<?php echo form_open('login/signin')?>
		<label for="name">Name:</label><br>
		<input type="text" name="name" value="<?php echo set_value('name')?>"><br>
		<span style="color: red;"><?php echo form_error('name');?></span>
		<br>

		<label for="password">Senha:</label><br>
		<input type="password" name="password" value=""><br>
		<span style="color: red;"><?php echo form_error('password')?></span>

		<input type="submit" value="Entrar">
	<?php echo form_close();?>
	
