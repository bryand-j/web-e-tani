<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class input extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_post');
    }
    public function penyuluh_post()
    {
        
    	$data=[
            'nama_penyuluh'=>$this->post('nama'),
            'golongan'=>$this->post('golongan'),
            'tempat_lahir'=>$this->post('tempat_lahir'),
            'tgl_lahir'=>$this->post('tgl_lahir'),
            'jenis_kelamin'=>$this->post('jenis_kelamin'),
            'agama'=>$this->post('agama'),
            'keterangan'=>$this->post('keterangan'),
            'status'=>$this->post('status'),
    	];
    	$act=$this->M_post->insert('penyuluh',$data);

    	$this->response($act, REST_Controller::HTTP_OK);
    }


}