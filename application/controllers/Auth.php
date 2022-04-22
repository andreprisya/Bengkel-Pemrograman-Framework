<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
}
?>