<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getUser()
	{
		return $this->db->get('user');
	}
	public function editUser($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);

		$isUpdate=$this->db->affected_rows();
		if ($isUpdate > 0){
			 $message = array(
            'type' =>'success',
            'text'=>'Data Berhasil Di Edit');
            return $message;
		}
		else{
			$message = array(
            'type' =>'error',
            'text'=>'Data Gagal Di Edit');
            return $message;
		}
	}
	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		$isDelete=$this->db->affected_rows();
		if ($isUpdate > 0){
			 $message = array(
            'type' =>'success',
            'text'=>'Data Berhasil Di Hapus');
            return $message;
		}
		else{
			$message = array(
            'type' =>'error',
            'text'=>'Data Gagal Di Hapus');
            return $message;
		}

	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */