<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kunjungan_m');
		$this->load->model('Dokter_m');
		$this->load->model('Pasien_m');
		$this->load->model('Obat_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Kunjungan Data Pasien';
		$data['kunjungan'] = $this->Kunjungan_m->get_join('berobat')->result_array();
		$data['dokter'] = $this->Dokter_m->get('dokter')->result_array();
		$data['pasien'] = $this->Pasien_m->get('pasien')->result_array();
		$this->form_validation->set_rules('pasien', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('dokter', 'Nama Dokter', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal Berobat', 'required|trim');
		// $this->form_validation->set_rules('keluhan', 'Keluhan', 'required|trim');
		// $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required|trim');
		// $this->form_validation->set_rules('penata', 'Penatalaksanaan', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/kunjungan/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'id_pasien' => html_escape($this->input->post('pasien', true)),
				'id_dokter' => html_escape($this->input->post('dokter', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->tambahDataKunjungan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Ditambahkan.</div>');
			redirect('admin/kunjungan');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Data Kunjungan Berobat';
		$where = ['id_berobat' => $id];
		$data['kunjungan'] = $this->Kunjungan_m->get_where('berobat', $where)->row_array();
		$this->form_validation->set_rules('pasien', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('dokter', 'Nama Dokter', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal Berobat', 'required|trim');
		$data['dokter'] = $this->Dokter_m->get('dokter')->result_array();
		$data['pasien'] = $this->Pasien_m->get('pasien')->result_array();
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/kunjungan/ubah', $data);
			$this->load->view('layout/footer');
		} else {
			$id = $this->input->post('id_berobat');
			$data = [
				'id_pasien' => html_escape($this->input->post('pasien', true)),
				'id_dokter' => html_escape($this->input->post('dokter', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->ubahDataKunjungan($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Diubah.</div>');
			redirect('admin/kunjungan');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('berobat', ['id_berobat' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Kunjungan Berhasil Dihapus.</div>');
		redirect('admin/kunjungan');
	}

	// REKAM MEDIS
	public function rekam($id)
	{
		// $id = id_berobat
		$data['title'] = 'Rekam Medis';
		// $where = ['id_pasien'];
		// $data['pasien'] = $this->Pasien_m->get_where('pasien', $where)->row_array();

		// Tampil detail rekam medis
		$data['d'] = $this->Kunjungan_m->get_rekam($id)->row_array();

		// Ambil id_berobat berdasarkan id_berobat / tampil riwayat kunjungan
		$where = ['id_berobat' => $id];
		$data['idBerobat'] = $this->Obat_m->get_where('berobat', $where)->row_array();
		$idPasien = $data['idBerobat']['id_pasien'];
		$data['riwayat'] = $this->Kunjungan_m->get_riwayat($idPasien)->result_array();

		// menampilkan data obat
		$data['obat'] = $this->Obat_m->get('obat')->result_array();
		// menampilkan resep obat
		// $idBerobat = $data['idBerobat']['id_berobat'];
		$data['resep'] = $this->Kunjungan_m->get_resep($id)->result_array();
		// var_dump($data['resep']);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/kunjungan/rekam_medis', $data);
		$this->load->view('layout/footer');
	}

	public function tambahRekam()
	{
		$idBerobat = $this->input->post('id_berobat', true);
		$keluhan = $this->input->post('keluhan', true);
		$diagnosa = $this->input->post('diagnosa', true);
		$penata = $this->input->post('penata', true);

		$data = [
			'keluhan' => $keluhan,
			'diagnosa' => $diagnosa,
			'penatalaksaan' => $penata
		];
		$where = ['id_berobat' => $idBerobat];
		$this->Kunjungan_m->update_where('berobat', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Rekam Medis Berhasil Diperbarui.</div>');
		redirect('admin/kunjungan/rekam/' . $idBerobat);
	}

	public function tambahResep()
	{
		$idBerobat = $this->input->post('id_berobat', true);
		$obat = $this->input->post('obat', true);

		$data = [
			'id_berobat' => $idBerobat,
			'id_obat' => $obat
		];

		$this->Kunjungan_m->insert('resep_obat', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep Obat Berhasil Diperbarui.</div>');
		redirect('admin/kunjungan/rekam/' . $idBerobat);
	}

	public function hapusResep($idResep, $idBerobat)
	{
		$this->db->delete('resep_obat', ['id_resep' => $idResep]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep Obat Berhasil Dihapus.</div>');
		redirect('admin/kunjungan/rekam/' . $idBerobat);
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Kunjungan/Berobat';
		$data['kunjungan'] = $this->Kunjungan_m->get_join('berobat')->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/laporan/laporan_kunjungan');
		$this->load->view('layout/footer');
	}

}