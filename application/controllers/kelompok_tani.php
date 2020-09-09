<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelompok_tani extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  
        $this->load->model('M_poktan');
      

    }

    // List all your items
    public function index( $offset = 0 )
    {
        
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('kelompok_tani');


    }

    public function getData()
    {
        $data=$this->M_poktan->getPoktan()->result();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->id;
            $row[] =$no;
            $row[]=$key->no_sk_poktan;
            $row[]=$key->nama_poktan;
            $row[]=$key->tanggal_berdiri;
            $row[]=$key->jumlah_anggota;
            $row[]=$key->status;
            $row[]='<div class="d-flex flex-row">
            <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
            <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';
            
            
            $output[]=$row;
        }
        $result=array(
        
            'data'=>$output,
            
        );
        echo json_encode($result);
    }

    // Add a new item
    public function add()
    {

    }

    //Update one item
    public function update( $id = NULL )
    {
         $data=[
                "no_sk_poktan"=>$this->input->post('no_sk_poktan'),
                "nama_poktan"=>$this->input->post('nama_poktan'),
                "tanggal_berdiri"=>$this->input->post('tanggal_berdiri'),
                "jumlah_anggota"=>$this->input->post('jumlah_anggota'),
                "status"=>$this->input->post('status'),
               
            ];
            $id = $this->input->post('id');
            $edit=$this->M_poktan->editPoktan($data,$id);
            echo json_encode($edit);
    }

    //Delete one item
    public function delete()
    {
        $id=$this->input->get('id');
        $hapus=$this->M_poktan->deletePoktan($id);
        echo json_encode($hapus);

    }
}

/* End of file Controllername.php */

