<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lahan extends CI_Model
{


	public function get()
	{
		$data = $this->db->get('lahan')->result();
		$result = array();
		foreach ($data as $key) {
			$row = array();
			$row['id'] = $key->id;
			$row['name'] = $key->nama_pemilik . ' - ' . $key->luas . ' ' . $key->satuan;
			$result[] = $row;
		}
		return $result;
	}

	public function getLahan()
	{
		return $this->db->get('lahan');
	}
	public function editLahan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('lahan', $data);

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
	public function deleteLahan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('lahan');
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
