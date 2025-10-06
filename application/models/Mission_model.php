<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Função para listar todas as missões
    public function get_missions() {
        $query = $this->db->get('missions');
        return $query->result();
    }

    // Função para obter uma missão específica
    public function get_mission($id) {
        $query = $this->db->get_where('missions', array('id' => $id));
        return $query->row();
    }

    public function get_mission_by_name($name){
        $query = $this->db->get_where('missions', ['name'=>$name]);
        return $query->row();
    }

    public function get_project_missions($project_id){
        $query = $this->db->get_where('missions', ['project_id'=>$project_id]);

        return $query->result();
    }

    // Função para inserir uma nova missão
    public function insert_mission($data) {
        return $this->db->insert('missions', $data);
    }

    // Função para atualizar uma missão
    public function update_mission($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('missions', $data);
    }

    // Função para deletar uma missão
    public function delete_mission($id) {
        $this->db->where('id', $id);
        return $this->db->delete('missions');
    }

    public function get_mission_by_project($project_id){
        
        $query = $this->db->get_where('missions', ['project_id'=>$project_id]);

        return $query->row();
    }
}