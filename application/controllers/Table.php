<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('table');
    }

    function index()
    {
        $this->load->view("table_vw");
    }
}
?>