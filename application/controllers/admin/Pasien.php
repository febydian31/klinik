<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Manajement Data Pasien';
		$data['pasien'] = $this->Pasien_m->get('pasien')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('jk', 'Kelamin Pasien', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur Pasien', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/pasien/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_pasien' => html_escape($this->input->post('nama', true)),
				'jk_pasien' => html_escape($this->input->post('jk', true)),
				'umur_pasien' => html_escape($this->input->post('umur', true))
			];
			$this->Pasien_m->tambahDataPasien($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Ditambahkan.</div>');
			redirect('admin/pasien');

		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Pasien';
		$where = ['id_pasien' => $id];
		$data['pasien'] = $this->Pasien_m->get_where('pasien', $where)->row_array();
		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('jk', 'Kelamin Pasien', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur Pasien', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/pasien/ubah', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_pasien');
			$data = [
				'nama_pasien' => html_escape($this->input->post('nama', true)),
				'jk_pasien' => html_escape($this->input->post('jk', true)),
				'umur_pasien' => html_escape($this->input->post('umur', true))
			];
			$this->Pasien_m->ubahDataPasien($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Diubah.</div>');
			redirect('admin/pasien');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('pasien', ['id_pasien' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Dihapus.</div>');
		redirect('admin/pasien');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Pasien';
		$data['pasien'] = $this->Pasien_m->get('pasien')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_pasien');
		$this->load->view('layout/footer');
	}

}