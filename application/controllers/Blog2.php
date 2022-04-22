<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // $data['judul'] = "Judul blog";
        // $data['isi'] = "Isi blog";
        // $this->load->view("blog_view", $data);
        $data['judul'] = "Judul blog";
        $data['isi'] = "Isi blog";
        $out = $this->load->view("blog_view", $data, true);
        echo $out;
    }
}
?>