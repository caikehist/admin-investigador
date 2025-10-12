<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	// Lista de funções permitidas para acessas as views/páginas
	protected $allowed_roles = ['PROFESSOR ORGANIZADOR', 'PROFESSOR COLABORADOR'];

	public function __constructor(){

		parent::__construct();

		$this->load->library('session');

		$this->check_access();
	}

	protected function check_access() {

		if(!$this->session->userdata('user_id')) {

			redirect('login');
			exit;
		}

		$user_role = $this->session->userdata('role');

		if(!in_array($user_role, $this->allowed_roles)){

			show_error('Acesso Proibido. Você não tem permissão para visualizar esta páginas', 403);
			exit;
		}
	}
}