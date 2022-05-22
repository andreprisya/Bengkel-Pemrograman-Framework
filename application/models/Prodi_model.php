<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
    public $table = 'Prodi';
    public $id = 'Prodi.id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByID($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id);
        $this->load->view("layout/header");
        $this->load->view("prodi/vw_ubah_prodi", $data);
        $this->load->view("layout/footer");
    }

    
}

?>