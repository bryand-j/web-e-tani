<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyuluh extends CI_Model
{

	public function getPenyuluh()
	{
		return $this->db->get('penyuluh');
	}
	public function editPenyuluh($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('penyuluh', $data);

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
	public function deletePenyuluh($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('penyuluh');
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

/* End of file M_penyuluh.php */
/* Location: ./application/models/M_penyuluh.php */