<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ukm_model');
	}

	public function index()
	{
		$data['judul'] = "Halaman Ukm";
		$data['ukm'] = $this->Ukm_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("ukm/vw_ukm", $data);
		$this->load->view("layout/footer");
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Ukm";

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Ukm', 'required', [
			'required' => 'Nama Ukm Wajib di isi'
		]);
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required', [
			'required' => 'Singkatan Wajib di isi'
		]);
		$this->form_validation->set_rules('tahun_berdiri',  'Tahun  Berdiri', 'required', [
			'required' => 'Tahun  Berdiri Wajib di isi'
		]);
		$this->form_validation->set_rules('bidang',  'Bidang', 'required', [
			'required' => 'Bidang Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("ukm/vw_tambah_ukm", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'singkatan' => $this->input->post('singkatan'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
				'bidang' => $this->input->post('bidang'),
			];
			$this->Ukm_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data UKM Berhasil Ditambah!</div>');
			redirect('Ukm');
		}
	}
	public function hapus($id)
	{
		$this->Ukm_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Ukm tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Ukm Berhasil Dihapus!</div>');
		}
		redirect('Ukm');
	}

	function edit($id)
	{
		$data['judul'] = "Halaman Edit Ukm";
		$data['ukm'] = $this->Ukm_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Ukm', 'required', [
			'required' => 'Nama Ukm Wajib di isi'
		]);
		$this->form_validation->set_rules('singkatan', 'Singkatan', 'required', [
			'required' => 'Singkatan Wajib di isi'
		]);
		$this->form_validation->set_rules('tahun_berdiri',  'Tahun  Berdiri', 'required', [
			'required' => 'Tahun  Berdiri Wajib di isi'
		]);
		$this->form_validation->set_rules('bidang',  'Bidang', 'required', [
			'required' => 'Bidang Wajib di isi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("ukm/vw_ubah_ukm", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'singkatan' => $this->input->post('singkatan'),
				'tahun_berdiri' => $this->input->post('tahun_berdiri'),
				'bidang' => $this->input->post('bidang'),
				'id' => $this->input->post('id')
			];
			$id = $this->input->post('id');
			$this->Ukm_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data UKM Berhasil Diubah!</div>');
			redirect('Ukm');
		}
	}
}
