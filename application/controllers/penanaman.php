<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penanaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  $this->load->model('M_index','i');
        $this->load->model('M_penanaman', 'tanaman');
    }

    // List all your items
    public function index($offset = 0)
    {

        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('penanaman');
    }

    // id
    // id_kelompok_tani
    // id_lahan
    // jenis_tanaman
    // nama_tanaman
    // tgl_tanam
    // perkiraan_tgl_panen
    // jumlah_tanam
    // jumlah_panen
    // status_penanaman
    // realisasi_panen
    // kebutuhan
    // estimasi_biaya
    // realisasi_kebutuhan
    // foto
    // lokasi
    public function getData()
    {
        $data = $this->tanaman->getData()->result();
        $output = array();
        $no = 0;
        foreach ($data as $key) {
            $row = array();
            $no++;
            $row[] = $key->id;
            $row[] = $no;
            $row[] = $key->nama_poktan;
            $row[] = $key->nama_pemilik;
            $row[] = $key->jenis_tanaman;
            $row[] = $key->nama_tanaman;
            $row[] = $key->tgl_tanam;
            $row[] = $key->perkiraan_tgl_panen;
            $row[] = $key->jumlah_tanam;
            $row[] = $key->jumlah_panen;
            $row[] = $key->status_penanaman;
            $row[] = $key->realisasi_panen;
            $row[] = $key->kebutuhan;
            $row[] = $key->estimasi_biaya;
            $row[] = $key->realisasi_kebutuhan;
            $row[] = '<img height="100" width="100" src="' . base_url() . 'assets/doc/' . $key->foto . '" >';
            $row[] = $key->lokasi;
            $row[] = '<div class="d-flex flex-row">
            <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
            <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';


            $output[] = $row;
        }
        $result = array(

            'data' => $output,

        );
        echo json_encode($result);
    }

    // Add a new item
    public function add()
    {
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}

/* End of file Controllername.php */
