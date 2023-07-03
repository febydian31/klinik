<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_m extends CI_Model {
	public function get_join($table)
	{
		$this->db->join("dokter", "dokter.id_dokter = $table.id_dokter");
		$this->db->join("pasien", "pasien.id_pasien = $table.id_pasien");
		return $this->db->get($table);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataKunjungan($data)
	{
		$this->db->insert('berobat', $data);
	}

	public function ubahDataKunjungan($data, $id)
	{
		$this->db->where('id_berobat', $id);
		$this->db->update('berobat', $data);
	}

	// REKAM MEDIS
	public function get_rekam($id)
	{
		$this->db->join("dokter", "dokter.id_dokter = berobat.id_dokter");
		$this->db->join("pasien", "pasien.id_pasien = berobat.id_pasien");
		$this->db->where('berobat.id_berobat', $id);
		return $this->db->get('berobat');
	}

	public function get_riwayat($idPasien)
	{
		$this->db->join("dokter", "dokter.id_dokter = berobat.id_dokter");
		$this->db->join("pasien", "pasien.id_pasien = berobat.id_pasien");
		$this->db->where('berobat.id_pasien', $idPasien);
		return $this->db->get('berobat');
	}

	public function get_resep($id)
	{
		// $this->db->select("resep_obat.*, obat.nama_obat");
		$this->db->join("obat", "obat.id_obat = resep_obat.id_obat");
		$this->db->join("berobat", "berobat.id_berobat = resep_obat.id_berobat");
		$this->db->where("resep_obat.id_berobat", "$id");
		return $this->db->get('resep_obat');
		// $query = "SELECT resep_obat.*, obat.nama_obat FROM resep_obat INNER JOIN resep_obat.id_obat = obat.id_obat WHERE resep_obat.id_berobat = berobat.$id";
		// return $this->db->query($query);
	}

}