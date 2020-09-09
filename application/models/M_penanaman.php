<?php
//php intelifens
defined('BASEPATH') or exit('No direct script access allowed');

class M_penanaman extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function get()
    {
        $this->db->select("p.id,p.foto, p.nama_tanaman,p.tgl_tanam,l.nama_pemilik");
        $this->db->from('penanaman p');
        $this->db->join('lahan l', 'p.id_lahan = l.id', 'left');
        $this->db->group_by('p.id');
        $this->db->order_by('tgl_tanam', 'DESC');


        return $this->db->get('penanaman', 4);
    }
    public function getUser($id)
    {
        $this->db->select('id,nama,golongan,tempat_lahir,tgl_lahir,agama,jenis_kelamin');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function getData()
    {
        $this->db->select("p.*,l.nama_pemilik,k.nama_poktan");
        $this->db->from('penanaman p');
        $this->db->join('lahan l', 'p.id_lahan = l.id', 'left');
        $this->db->join('kelompok_tani k', 'k.id = p.id_kelompok_tani', 'left');
        $this->db->group_by('p.id');
        $this->db->order_by('tgl_tanam', 'DESC');
        return $this->db->get();
    }
    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('penanaman', $data);

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
                'text' => 'Tidak Ada Perubahan Data'
            );
            return $message;
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penanaman');
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
