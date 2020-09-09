<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class profile extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_post');
    }
    public function index_post()
    {
    	$data=[
    		'nama'=>$this->post('nama'),
        	'golongan'=>$this->post('golongan'),
        	'tempat_lahir'=>$this->post('tempat_lahir'),
        	'tgl_lahir'=>$this->post('tgl_lahir'),
        	'agama'=>$this->post('agama'),
        	'jenis_kelamin'=>$this->post('jenis_kelamin')
    	];
    	$id=$this->post('id');
    	$act=$this->M_post->update($id,$data);

    	$this->response($act, REST_Controller::HTTP_OK);
    }

}