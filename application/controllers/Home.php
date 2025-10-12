<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega o modelo
        $this->load->model('Artifact_model');
        $this->load->model('User_model');
        $this->load->model('Mission_model');
        // Carrega o helper de URL para usar a função 'base_url()'
        $this->load->helper('url');
        $this->load->library('upload');

        if(!$this->session->userdata('logged_in'))
        {
            // Se não estiver logado, redireciona para o login
            redirect('login');
        }
    }

    // Exibe a lista de artefato (página principal)
    public function index() {

        $data['title'] = 'Home';
        $main_content = 'home';
        
        $data['missions'] = $this->Mission_model->get_missions();

        $this->load->view('template_admin', [
            'main_content'  => $main_content,
            'data'          => $data
        ]);
    }
}