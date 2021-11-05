<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class lahan extends REST_Controller
{



    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_lahan', 'lahan');
        $this->load->model('M_post', 'Insert');
    }

    public function index_get()
    {
        $data = $this->lahan->get();
        $this->set_response([
            'status' => true,
            'data' => $data,
        ], REST_Controller::HTTP_OK);
    }
    public function index_post()
    {
        $data = [
            "nama_pemilik" => $this->post('nama'),
            "luas" => $this->post('luas'),
            "satuan" => $this->post('satuan'),
        ];

        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
        if ($this->form_validation->run() == FALSE) {

            $message = [
                "status" => false,
                "message" => validation_errors(' ', ' '),
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $respon = $this->Insert->insert('lahan', $data);
            $this->response($respon, REST_Controller::HTTP_OK);
        }
    }
}
