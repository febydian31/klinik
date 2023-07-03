<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Users';
		$data['users'] = $this->Users_m->get('users')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('admin/users/index');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_lengkap' => html_escape($this->input->post('nama', true)),
				'username' => html_escape($this->input->post('username', true)),
				'password' => html_escape(sha1($this->input->post('password', true)))
			];
			$this->Users_m->tambahDataUser($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Ditambahkan.</div>');
			redirect('admin/users');
		}
	}

	public function getuserid()
	{
		// $id = $_POST['id'];
		// $where = [
		// 	'id_user' => $id
		// ];
		echo json_encode($this->Users_m->get_where($_POST['id']));
	}

	public function ubahUser()
	{
		$this->Users_m->ubahDataUser($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Diubah.</div>');
		redirect('admin/users');
	}

	public function hapus($id)
	{
		$this->db->delete('users', ['id_user' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Dihapus.</div>');
		redirect('admin/users');
	}

}