<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies

    }
    public function login($userName,$password)
    {
        $this->db->where('nama',$userName);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }
    public function getUser($id)
    {
        $this->db->select('id,nama,golongan,tempat_lahir,tgl_lahir,agama,jenis_kelamin');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get();
    }
}