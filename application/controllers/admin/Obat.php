<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Manajement Data Obat';
		$data['obat'] = $this->Obat_m->get('obat')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Obat', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/obat/index');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_obat' => html_escape($this->input->post('nama', true))
			];
			$this->Obat_m->tambahDataObat($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Ditambahkan.</div>');
			redirect('admin/obat');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Obat';
		$where = ['id_obat' => $id];
		$data['obat'] = $this->Obat_m->get_where('obat', $where)->row_array();
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/obat/ubah', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_obat');
			$data = [
				'nama_obat' => $this->input->post('nama', true)
			];
			$this->Obat_m->ubahDataObat($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Diubah.</div>');
			redirect('admin/obat');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('obat', ['id_obat' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Dihapus.</div>');
		redirect('admin/obat');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Obat';
		$data['obat'] = $this->Obat_m->get('obat')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_obat');
		$this->load->view('layout/footer');
	}

}