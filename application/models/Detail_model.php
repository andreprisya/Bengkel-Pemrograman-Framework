<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{
    public $table = 'detail_penjualan';
    public $id = 'detail_penjualan.id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('k.*, j.nama as nama, j.harga as harga');
        $this->db->from('keranjang k');
        $this->db->join('sembako j', 'k.id_jam = sjid');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByID($id)
    {
        $this->db->select('d.*, r.nama as nama, j.nama as jam');
        $this->db->from('detail_penjualan d');
        $this->db->join('user r', 'd.id_user = r.id');
        $this->db->join('sembako j', 'd.id_jam = j.id');
        $this->db->where('d.no_penjualan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByUser($id)
    {
        $idu = $this->session->userdata('id');
        $this->db->select('d.*, j.nama as nama_jam');
        $this->db->from('detail_penjualan d');
        $this->db->join('sembako j', 'd.id_jam = j.id');
        $this->db->where('d.no_penjualan', $id, 'AND d.id_user =' . $idu);
        $this->db->where('d.id_user = ' . $idu);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}

?>