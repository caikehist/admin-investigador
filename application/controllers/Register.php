<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller{
	public function __construct() {

		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('User_model');

		if(!$this->session->userdata('logged_in'))
        {
            // Se não estiver logado, redireciona para o login
            redirect('login');
        }

		if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
            redirect('mission/map');
        }
	}

	public function index() {
		if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
		    redirect('mission/map');
		} else {
			$data['user_types'] = [
				''							=> 'Selecione um Tipo de Usuário',
				'PROFESSOR COLABORADOR'		=> 'Professor Colaborador',
				'PROFESSOR ORGANIZADOR'		=> 'Professor Organizador',
				'ALUNO'						=> 'Aluno',
				'ALUNO COLABORADOR'			=> 'Aluno Colaborador',
			];
			$this->load->view('users/register_view', $data);
		}
	}

	public function create_user() {
		if($this->session->userdata('logged_in') && $this->session->userdata('type') == 'ALUNO'){
		    redirect('mission/map');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|is_unique[users.name]');
			//$this->form_validation->set_rules('type', 'Type', 'required|in_list[PROFESSOR COLABORADOR,PROFESSOR ORGANIZADOR,ALUNO,ALUNO COLABORADOR');
			$this->form_validation->set_rules('desc', 'Description', 'trim');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation','trim|required|matches[password]');

			if($this->form_validation->run() == FALSE){
				// Validação falhou, recarrega a view com os erros
				$this->index();
			} else {
				$password = $this->input->post('password');
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);

				$data = [
					'name'		=> $this->input->post('name', TRUE),
					'desc'		=> $this->input->post('desc', TRUE),
					'type'		=> $this->input->post('type'),
					'password'	=> $hashed_password,
				];

				if($this->User_model->register_user($data)){

					$this->session->set_flashdata('success_msg', 'Registrado com sucesso! Agora, você pode logar.');
					redirect('login');
				} else {
					$this->session->set_flashdata('error_msg', 'Ocorreu um erro durante o registro.');
					redirect('register');
				}
			}
		}
	}
}