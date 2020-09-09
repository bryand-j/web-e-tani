<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class Auth extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_auth','auth');
    }
    public function index_get()
    {
        $id=$this->get('id');
        if ($id !=NULL) {
            $data=$this->auth->getUser($id);
            if ($data->num_rows() > 0) {
                $this->set_response([
                    'status' => true,
                    'data' => $data->result(),
                ], REST_Controller::HTTP_OK);
            } else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Data Tidak Ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
            
        }
        else{
            $this->response([
                    'status' => FALSE,
                    'message' => 'Data Tidak Ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_post()
    {
        $userName=$this->post('userName');
        $password=$this->post('password');
        if (($userName !='') && ($password != '')) {
            $cek=$this->auth->login($userName,$password);
            if ($cek->num_rows() > 0) {
                $data=$this->auth->getUser($cek->row()->id);
                $this->set_response([
                    'status' => true,
                    'data'=>$data->result(),
                ], REST_Controller::HTTP_OK);
            } else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Username atau Password salah'
                ], REST_Controller::HTTP_OK);
            }
            
        }
        else{
            $this->response([
                    'status' => FALSE,
                    'message' => 'Masukan Username dan Password'
                ], REST_Controller::HTTP_OK);
        }
    }
}