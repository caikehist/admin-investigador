<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artifact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Função para listar todos os artefatos
    public function get_artifacts() {
        $query = $this->db->get('artifacts');
        return $query->result();
    }

    // Função para obter um artefato específica
    public function get_artifact($id) {
        $query = $this->db->get_where('artifacts', array('id' => $id));
        return $query->row();
    }

    // Função para inserir um novo artefato
    public function insert_artifact($data) {
        return $this->db->insert('artifacts', $data);
    }

    // Função para atualizar um artefato
    public function update_artifact($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('artifacts', $data);
    }

    // Função para deletar um artefato
    public function delete_artifact($id) {
        $this->db->where('id', $id);
        return $this->db->delete('artifacts');
    }
}