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

    // Formulário para adicionar um novo artefato
    public function add() {
        
        $data['title'] = 'Adicionar Missão';
        $main_content = 'missions/add';


        $data['users'] = $this->User_model->get_users();
        $this->load->view('template_admin', [
            'main_content'  => $main_content,
            'data'          => $data,
        ]);
    }

    public function save(){
        $data = array(
            'name'              => $this->input->post('name'),
            'desc'              => $this->input->post('desc'),
            'begin_at'          => $this->input->post('begin_at'),
            'final_preview'     => $this->input->post('final_preview'),
            'final_real'        => $this->input->post('final_real'),
        );
        $this->Mission_model->insert_mission($data);
        redirect('missions/edit/'.$this->db->insert_id());
    }

    // Salva o novo artefato no banco de dados
    public function _save() {


        $main_content = 'missions/add';

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|mp4|mp3';
        $config['max_size'] = 5000;

        // Inicializa a biblioteca upload do CI3 com a configuração informada
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('artifact_file')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('template_admin', [
                'error'         => $error,
                'main_content'  => $main_content,
            ]);
            exit;
        } else {
            $upload_data = $this->upload->data();
            //print_r($upload_data);exit;
            $artifact_path = 'uploads/' . $upload_data['file_name'];

            $data = array(
                'artifact_name'  => $this->input->post('artifact_name'),
                //'desc' => $this->input->post('desc'),
                'registry_date' => $this->input->post('registry_date'),
                'registered_by' => $this->input->post('registered_by'),
                'collected_date' => $this->input->post('collected_date'),
                'collected_by' => $this->input->post('collected_by'),
                'type' => $this->input->post('type'),
                'artifact_path' => $artifact_path,
            );
            $this->Artifact_model->insert_artifact($data);
            redirect('missions/edit/'.$this->db->insert_id());
        }

        
    }

    // Formulário para editar um artefato
    public function edit($id) {

        $data['title'] = 'Editar Missão';
        $main_content = 'missions/edit';

        $data['mission'] = $this->Mission_model->get_mission($id);
        $data['user'] = $this->User_model->get_user($data['artifact']->collected_by);
        $this->load->view('template_admin', [
            'data'          => $data,
            'main_content'  => $main_content,
        ]);
    }

    // Atualiza o artefato no banco de dados
    public function update($id) {
        $data = array(
            'artifact_name'  => $this->input->post('artifact_name'),
            'desc' => $this->input->post('desc'),
            'registry_date' => $this->input->post('registry_date'),
            'registered_by' => $this->input->post('registered_by'),
            'collected_date' => $this->input->post('collected_date'),
            'collected_by' => $this->input->post('collected_by'),
            'type' => $this->input->post('type'),
        );
        $this->Artifact_model->update_artifact($id, $data);
        redirect('artifact');
    }

    // Deleta um artefato
    public function delete($id) {
        $this->Artifact_model->delete_artifact($id);
        redirect('artifact');
    }

    public function assign_mission() {

        $data['title'] = 'Adicionar Missão';
        $main_content = 'missions/assign_mission';


        $data['users'] = $this->User_model->get_users();
        $this->load->view('template_admin', [
            'main_content'  => $main_content,
            'data'          => $data,
        ]);
    }

}