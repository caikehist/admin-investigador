<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>Bem-vindo ao Dashboard!</h2>
    <p>Olá, <strong><?php echo $user_name; ?></strong>. Você está logado!</p>
    
    <p><a href="<?php echo base_url('login/logout'); ?>">Sair</a></p>

</body>
</html>