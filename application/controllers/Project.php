<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
    }

    // Exibe a lista de artefato (página principal)
    public function index() {

        $data['title'] = 'Listar Projetos';
        $main_content = 'projects/list';
        
        $data['projects'] = $this->Project_model->get_projects();

        $this->load->view('template_admin', [
            'main_content'  => $main_content,
            'data'          => $data
        ]);
    }

    // Formulário para adicionar um novo artefato
    public function add() {
        
        $data['title'] = 'Novo Projeto';
        $main_content = 'projects/add';


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
            'team'              => $this->input->post('team_ids'),
            'institution'       => $this->input->post('institution'),
        );
        
        redirect('project/edit/'. $this->Project_model->insert_project($data));
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

        $data['title'] = 'Editar Projeto';
        $main_content = 'projects/edit';

        $data['project'] = $this->Project_model->get_project($id);
        $data['team_ids'] = explode(',', $data['project']->team);
        $data['team_ids'] = array_map('intval', $data['team_ids']);


        $team_members = [];
        if(!empty($data['team_ids'])){
            $data['team_members'] = $this->User_model->get_users_by_ids($data['team_ids']);
        }

        // Retornar apenas as missions desse projeto
        $data['missions'] = $this->Mission_model->get_project_missions($id);

        //$data['user'] = $this->User_model->get_user($data['artifact']->collected_by);
        $this->load->view('template_admin', [
            'data'          => $data,
            'main_content'  => $main_content,
        ]);
    }

    // Atualiza o projeto no banco de dados
    public function update() {
        $data = array(
            //'name'              => $this->input->post('name'),
            'desc'              => $this->input->post('desc'),
            'begin_at'          => $this->input->post('begin_at'),
            'final_preview'     => $this->input->post('final_preview'),
            'final_real'        => $this->input->post('final_real'),
            'team'              => $this->input->post('team_ids'),
            //'institution'       => $this->input->post('institution'),
        );
        $this->Project_model->update_project($this->input->post('project_id'), $data);
        redirect('project');
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