<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }

    function index()
    {
        $data['judul'] = "Halaman Profil";
        $data['profil'] = $this->userrole->getBy();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("user/vw_profil", $data);
        $this->load->view("layout/footer", $data);
    }
}
?>