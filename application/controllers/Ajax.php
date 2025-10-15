<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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

        if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        }
    }

    public function get_mission_by_name(){

        if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        } else {

            // Define o cabeçalho para indicar que a resposta é JSON
            header('Content-Type: application/json');

            // Verifica se a requisição é do tipo AJAX
            if (!$this->input->is_ajax_request()) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Acesso negado.'
                ]);
                return;
            }

            // Recupera os dados enviados via POST
            $name = $this->input->get('name');
            
            // Exemplo de processamento simples
            if ($name) {
                // Se os dados existem, envia uma resposta de sucesso
                echo json_encode([
                    'status'           => 'success',
                    'mission_id'       => $this->Mission_model->get_mission_by_name($name)->id,
                    'name'             => $this->Mission_model->get_mission_by_name($name)->name,
                    'desc'             => $this->Mission_model->get_mission_by_name($name)->desc,
                    'begin_at'         => $this->Mission_model->get_mission_by_name($name)->begin_at,
                    'final_preview'    => $this->Mission_model->get_mission_by_name($name)->final_preview,
                    'final_real'       => $this->Mission_model->get_mission_by_name($name)->final_real,
                ]);
            } else {
                // Se os dados não foram enviados, envia uma resposta de erro
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Dados incompletos. Por favor, preencha todos os campos.'
                ]);
            }
        }
    }

    public function search_users(){
        if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        } else {
            // Define o cabeçalho para indicar que a resposta é JSON
            header('Content-Type: application/json');

            // Recebe o termo de busca via POST
            $searchTerm = $this->input->post('search_term', TRUE);

            if (empty($searchTerm) || strlen($searchTerm) < 2) {
                echo json_encode([]);
                return;
            }

            // Busca os usuários no modelo
            $users = $this->User_model->search_by_name($searchTerm);

            echo json_encode($users);
        }
    }
}