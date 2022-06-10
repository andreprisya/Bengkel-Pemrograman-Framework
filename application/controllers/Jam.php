<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');
        $this->load->model('User_model');
        $this->load->model('Jam_model');
    }

    function index()
    {
        $data['judul'] = "Halaman Jam";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jam'] = $this->Jam_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("jam/vw_jam", $data);
        $this->load->view("layout/footer", $data);
    }

    function tambah()
    {
        $data['judul'] = "Halaman Tambah Jam";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Jam', 'required', [
            'required' => 'Nama Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'Keterangan Jam Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Jam/vw_tambah_jam", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/jam';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Jam_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jam Berhasil Ditambah!</div>');
            redirect('Jam');
        }
    }

    public function hapus($id)
    {
        $this->Jam_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert"><i class="icon fas fa-info-circle"></i>Data Jam tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"><i class="icon fas fa-check-circle"></i>Data Jam Berhasil Dihapus!</div>');
        }
        redirect('Jam');
    }

    // function upload()
    // {
    //     $data = [
    //         'nama' =>  $this->input->post('nama'),
    //         'ruangan' =>  $this->input->post('ruangan'),
    //         'jurusan' =>  $this->input->post('jurusan'),
    //         'akreditasi' =>  $this->input->post('akreditasi'),
    //         'nama_kaJam' =>  $this->input->post('nama_kaJam'),
    //         'tahun_berdiri' =>  $this->input->post('tahun_berdiri'),
    //         'output_lulusan' =>  $this->input->post('output_lulusan'),
    //     ];
    //     $this->Jam_model->insert($data);
    //     redirect('Jam');
    // }

    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Jam";
        $data['jam'] = $this->Jam_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Jam', 'required', [
            'required' => 'Nama Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Jam Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required' => 'Keterangan Jam Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Jam/vw_ubah_jam", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/jam';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['Jam']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/jam/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Jam_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Diubah!</div>');
            redirect('Jam');
        }
    }

    // public function update()
    // {
    //     $data = [
    //         'nama' => $this->input->post('nama'),
    //         'ruangan' => $this->input->post('ruangan'),
    //         'jurusan' => $this->input->post('jurusan'),
    //         'akreditasi' => $this->input->post('akreditasi'),
    //         'nama_kaJam' => $this->input->post('nama_kaJam'),
    //         'tahun_berdiri' => $this->input->post('tahun_berdiri'),
    //         'output_lulusan' => $this->input->post('output_lulusan'),
    //     ];
    //     $id = $this->input->post('id');
    //     $this->Jam_model->update(['id' => $id], $data);
    //     redirect('Jam');
    // }
}
