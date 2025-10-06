<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    </head>
<body>
    <?php $this->load->view('header_view', $data); ?>

    <?php $this->load->view($main_content, $data); ?>

    <?php $this->load->view('footer_view', $data); ?>

</body>
</html>