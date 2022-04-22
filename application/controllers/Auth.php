<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }

    public function index()
    {
        $this->load->view("layout/auth_header");
        $this->load->view("auth/login");
        $this->load->view("layout/auth_footer");
    }

    public function registrasi()
    {
        $this->load->view("layout/auth_header");
        $this->load->view("auth/registrasi");
        $this->load->view("layout/auth_footer");
    }

    public function cek_regis()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'gambar' => 'default.jpg',
            'role' => "User",
            'date_created' => time()

        ];
        $this->userrole->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
        role="alert">Selamat Akunmu sudah berhasil terdaftar, silahkan login!</div>
        ');
        redirect('Auth');
    }
}
?>