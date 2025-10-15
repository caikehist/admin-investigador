<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $this->load->view('header_admin'); ?>
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding-top: 56px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar bg-dark text-white col-md-2 p-0">
        <div class="sidebar-heading p-3 text-center border-bottom border-light">
            <h5 class="my-0">Dashboard</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url()?>">
                    <i class="fas fa-home me-2"></i> Início
                </a>
            </li> 

            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo base_url('artifact/my_artifacts'); ?>">
                    <i class="fas fa-box-open me-2"></i> Meus Artefatos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('user/profile')?>">
                    <i class="fas fa-users me-2"></i> Meu Perfil
                </a>
            </li>
           
        </ul>
    </div>
    <main class="col-md-10 offset-md-2 p-4">
        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 rounded shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1"><?php echo isset($data['titulo']) ? $data['titulo'] : 'Dashboard'; ?></span>
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item">
                            <span class="nav-link"><?php echo $this->session->userdata('user_name');?> | <?php echo $this->session->userdata('type')?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('login/logout')?>">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php $this->load->view($main_content, $data); ?>

        </div>
    </main>
    </div>

<?php $this->load->view('footer_admin'); ?>

</body>
</html>