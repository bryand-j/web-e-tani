<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class poktan extends REST_Controller {



	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_poktan','poktan');
        $this->load->model('M_post','Insert');
    }


	public function index_get()
	{
		$data=$this->poktan->get();
		$this->set_response([
                    'status' => true,
                    'data' => $data,
                ], REST_Controller::HTTP_OK);
	}
    public function index_post()
    {
        $data=[
            "no_sk_poktan"=>$this->post('no_sk'),
            "nama_poktan"=>$this->post('nama'),
            "tanggal_berdiri"=>$this->post('tgl_berdiri'),
            "jumlah_anggota"=>$this->post('jumlah'),
            "status"=>$this->post('status'),
        ];
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('no_sk_poktan','No SK','required');
        $this->form_validation->set_rules('nama_poktan','Nama','required');
        $this->form_validation->set_rules('tanggal_berdiri','Tanggal Berdiri','required');
        $this->form_validation->set_rules('jumlah_anggota','Jumlah Anggota','required');
        $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
        if($this->form_validation->run()==FALSE){
            
            $message = [
                "status" =>false,
                "message"=> validation_errors(' ',' '),
                ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else{
            $respon=$this->Insert->insert('kelompok_Tani',$data);
            $this->response($respon, REST_Controller::HTTP_OK);
        }

        
    }

}

