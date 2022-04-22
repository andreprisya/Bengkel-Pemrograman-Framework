<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');
    }

    function index()
    {
        $data['judul'] = "Halaman Mahasiswa";
        $data['mahasiswa'] = $this->Mahasiswa_model->get();
        $this->load->view("layout/header");
        $this->load->view("mahasiswa/vw_mahasiswa", $data);
        $this->load->view("layout/footer");
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Mahasiswa";
        $data['prodi'] = $this->Prodi_model->get();
        $this->load->view("layout/header");
        $this->load->view("mahasiswa/vw_tambah_mahasiswa", $data);
        $this->load->view("layout/footer");
    }

    function detail()
    {
        $data['judul'] = "Halaman Detail Mahasiswa";
        $this->load->view("layout/header");
        $this->load->view("mahasiswa/vw_detail_mahasiswa", $data);
        $this->load->view("layout/footer");
    }

    function upload()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'prodi' => $this->input->post('prodi'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'asal_sekolah' => $this->input->post('asal_sekolah')
        ];
        $this->Mahasiswa_model->insert($data);
        redirect('Mahasiswa');
    }

    function edit($id)
    {
        $data['judul'] = "Halaman Edit Mahasiswa";
        $data['prodi'] = $this->Prodi_model->get();
        $data['mahasiswa'] = $this->Mahasiswa_model->getById($id);
        $this->load->view("layout/header");
        $this->load->view("mahasiswa/vw_ubah_mahasiswa", $data);
        $this->load->view("layout/footer");
    }

    function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'prodi' => $this->input->post('prodi'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'asal_sekolah' => $this->input->post('asal_sekolah')
        ];
        $id = $this->input->post('id');
        $this->Mahasiswa_model->update(['id' => $id], $data);
        redirect('Mahasiswa');
    }
}
?>