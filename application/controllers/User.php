<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega o modelo
        $this->load->model('User_model');
        // Carrega o helper de URL para usar a função 'base_url()'
        $this->load->helper('url');
    }

    // Exibe a lista de usuários (página principal)
    public function index() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('users/list', $data);
    }

    // Formulário para adicionar um novo usuário
    public function add() {
        $this->load->view('users/add');
    }

    // Salva o novo usuário no banco de dados
    public function save() {
        $data = array(
            'name'  => $this->input->post('name'),
            'desc' => $this->input->post('desc'),
			'type' => $this->input->post('type')
        );
        $this->User_model->insert_user($data);
        redirect('user');
    }

    // Formulário para editar um usuário
    public function edit($id) {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('users/edit', $data);
    }

    // Atualiza o produto no banco de dados
    public function update($id) {
        $data = array(
            'name'  => $this->input->post('name'),
            'desc' => $this->input->post('desc'),
			'type' => $this->input->post('type')
        );
        $this->User_model->update_user($id, $data);
        redirect('users');
    }

    // Deleta um usuário
    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}