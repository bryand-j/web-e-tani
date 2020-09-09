<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_post extends CI_Model {


	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);

		$isUpdate=$this->db->affected_rows();
		if ($isUpdate > 0){
			 $message = array(
            'status' => TRUE,
            'message' => 'Profil Di Ubah');
            return $message;
		}
		else{
			$message = array(
            'status' =>false,
            'message'=>'Tidak Ada Perubahan Data');
            return $message;
		}
	}

	public function insert($table,$data)
	{
		$this->db->insert($table, $data);
		$insert=$this->db->affected_rows();
		if ($insert > 0){
			 $message = array(
            'status' => TRUE,
            'message' => "Data $table Di Simpan");
            return $message;
		}
		else{
			$message = array(
            'status' =>false,
            'text'=>"Data $table Gagal Disimpan");
            return $message;
		}
	}
	

}
