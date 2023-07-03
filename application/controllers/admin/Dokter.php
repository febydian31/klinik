<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Dokter';
		$data['dokter'] = $this->Dokter_m->get('dokter')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/dokter/index');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_dokter' => html_escape($this->input->post('nama', true))
			];
			$this->Dokter_m->tambahDataDokter($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Ditambahkan.</div>');
			redirect('admin/dokter');
		}
	}

	

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Dokter';
		$where = ['id_dokter' => $id];
		$data['dokter'] = $this->Dokter_m->get_where('dokter', $where)->row_array();
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/dokter/ubah');
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_dokter');
			$data = [
				'nama_dokter' => $this->input->post('nama', true)
			];
			$this->Dokter_m->ubahDataDokter($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Diubah.</div>');
			redirect('admin/dokter');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('dokter', ['id_dokter' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Dihapus.</div>');
		redirect('admin/dokter');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Dokter';
		$data['dokter'] = $this->Dokter_m->get('dokter')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_dokter');
		$this->load->view('layout/footer');
	}

}