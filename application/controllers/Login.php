<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('users/login_view', $data);
	}

	// Processa a submissão do formulário
	public function signin() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	

	if($this->form_validation->run() == FALSE){
		// Falha na validação
		$this->index();
	} else {

		$username = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->User_model->validate_login($username, $password);
	}

		if($user) {
			$session_data = array(
				'user_id'	=> $user->id,
				'user_name'	=> $user->name,
				'type'		=> $user->type,
				'logged_in'	=> TRUE
			);

			$this->session->set_userdata($session_data);

			// Redireciona para uma área restrita
			redirect('home');
		} else {

			$this->session->set_flashdata('error_msg', 'Usuário ou senha incorreto.');

			redirect('login');
		}
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in'))
		{
			$data['user_name'] = $this->session->userdata('user_name');
			$this->load->view('users/dashboard_view', $data);
		} else {
			// Se não estiver logado, redireciona para o login
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}