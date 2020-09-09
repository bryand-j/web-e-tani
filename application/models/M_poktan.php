<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_poktan extends CI_Model
{





	public function get()
	{
		$data = $this->db->get('kelompok_Tani')->result();
		$result = array();
		foreach ($data as $key) {
			$row = array();
			$row['id'] = $key->id;
			$row['name'] = $key->nama_poktan;
			$result[] = $row;
		}
		return $result;
	}

	public function getPoktan()
	{
		return $this->db->get('kelompok_tani');
	}
	public function editPoktan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('kelompok_tani', $data);

		$isUpdate = $this->db->affected_rows();
		if ($isUpdate > 0) {
			$message = array(
				'type' => 'success',
				'text' => 'Data Berhasil Di Edit'
			);
			return $message;
		} else {
			$message = array(
				'type' => 'error',
				'text' => 'Data Gagal Di Edit'
			);
			return $message;
		}
	}
	public function deletePoktan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kelompok_tani');
		$isDelete = $this->db->affected_rows();
		if ($isDelete > 0) {
			$message = array(
				'type' => 'success',
				'text' => 'Data Berhasil Di Hapus'
			);
			return $message;
		} else {
			$message = array(
				'type' => 'error',
				'text' => 'Data Gagal Di Hapus'
			);
			return $message;
		}
	}
}
