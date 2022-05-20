<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');
    }

    function index()
    {
        $data['judul'] = "Halaman Prodi";
        $data['prodi'] = $this->Prodi_model->get();
        $this->load->view("layout/header");
        $this->load->view("prodi/vw_prodi", $data);
        $this->load->view("layout/footer");
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Mahasiswa";
        $this->load->view("layout/header");
        $this->load->view("prodi/vw_tambah_prodi", $data);
        $this->load->view("layout/footer");
    }
}
?>