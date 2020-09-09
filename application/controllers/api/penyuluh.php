<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class penyuluh extends REST_Controller {



	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->load->model('M_penyuluh','penyuluh');
        $this->load->model('M_post','Insert');
    }


    public function index_post()
    {
        $data=[
                "nama_penyuluh"=>$this->post('nama'),
                "golongan"=>$this->post('golongan'),
                "tempat_lahir"=>$this->post('tempat_lahir'),
                "tgl_lahir"=>$this->post('tgl_lahir'),
                "jenis_kelamin"=>$this->post('jenis_kelamin'),
                "agama"=>$this->post('agama'),
                "keterangan"=>$this->post('keterangan'),
                "status"=>$this->post('status'),
                "alasan"=>$this->post('alasan'),
                "lainya"=>$this->post('lainya'),
            ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama_penyuluh','Nama','required');
        $this->form_validation->set_rules('golongan','Golongan','required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
        if($this->form_validation->run()==FALSE){
            
            $message = [
                "status" =>false,
                "message"=> validation_errors(' ',' '),
                ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else{
            $respon=$this->Insert->insert('penyuluh',$data);
            $this->response($respon, REST_Controller::HTTP_OK);
        }
    }

}

