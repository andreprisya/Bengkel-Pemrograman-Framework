<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    public $table = 'Keranjang';
    public $id = 'Keranjang.id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $id = $this->session->userdata('id');
        $this->db->select('k.*, j.nama as nama, j.harga as harga');
        $this->db->from('keranjang k');
        $this->db->join('sembako j', 'k.id_jam = j.id');
        $this->db->where('k.id_user', $id);
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

    public function delete_all($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function jumlah()
    {
        $id = $this->session->userdata('id');
        $query = $this->db->get($this->table);
        $this->db->where('id_user', $id);
        return $query->num_rows();
    }
}

?>