<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Função para listar todos os usuários
    public function get_users() {

        $query = $this->db->get('users');
        return $query->result();
    }

    // Função para obter um usuario específico
    public function get_user($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    // Função para inserir um novo usuário
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // Função para atualizar um usuário
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Função para deletar um usuario
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function search_by_name(){
        $this->db->select('id, name, type');
        $this->db->like('name', $search_term);
        $query = $this->db->get('users');
        
        return $query->result();
    }

    public function get_users_by_ids($ids){
        $this->db->select('id, name, type');
        $this->db->where_in('id', $ids);

        $query = $this->db->get('users');

        return $query->result();
    }
}