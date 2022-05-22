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

    function upload()
    {
        $data = [
            'nama' =>  $this->input->post('nama'),
            'ruangan' =>  $this->input->post('ruangan'),
            'jurusan' =>  $this->input->post('jurusan'),
            'akreditasi' =>  $this->input->post('akreditasi'),
            'nama_kaprodi' =>  $this->input->post('nama_kaprodi'),
            'tahun_berdiri' =>  $this->input->post('tahun_berdiri'),
            'output_lulusan' =>  $this->input->post('output_lulusan'),
        ];
        $this->Prodi_model->insert($data);
        redirect('Prodi');
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'ruangan' => $this->input->post('ruangan'),
            'jurusan' => $this->input->post('jurusan'),
            'akreditasi' => $this->input->post('akreditasi'),
            'nama_kaprodi' => $this->input->post('nama_kaprodi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'output_lulusan' => $this->input->post('output_lulusan'),
        ];
        $id = $this->input->post('id');
        $this->Prodi_model->update(['id' => $id], $data);
        redirect('Prodi');
    }
}
?>