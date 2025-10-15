<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega o modelo
        $this->load->model('Artifact_model');
        $this->load->model('User_model');
        $this->load->model('Mission_model');
        $this->load->model('Project_model');
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

        if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        } else {
            $data['title'] = 'Listar Missões';
            $main_content = 'missions/list';
            
            $data['missions'] = $this->Mission_model->get_missions();

            foreach ($data['missions'] as $key => $value) {

                $value->project_name = $this->Project_model->get_project($value->project_id)->name;
            }

            $this->load->view('template_admin', [
                'main_content'  => $main_content,
                'data'          => $data
            ]);
        }

        
    }

    public function map(){
        

        $data['title'] = 'Mapa de Missões';
        $main_content = 'maps/missions_map';

        $this->load->view('template_view', [
            'main_content'  => $main_content,
            'data'          => $data,
        ]);
    }

    public function assign_mission() {

        if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        } else {

            $data['title'] = 'Adicionar Missão';
            $main_content = 'missions/assign_mission';


            $data['users'] = $this->User_model->get_users();
            $this->load->view('template_admin', [
                'main_content'  => $main_content,
                'data'          => $data,
            ]);
        }
    }

}