<?php
defined('BASEPATH') or exit('No direct script access allowed');

class index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  $this->load->model('M_index','i');
        if (empty($this->session->userdata('id'))) {

            redirect('login', 'refresh');
        }
    }

    // List all your itemsa
    public function index()
    {
        $data = [
            "penyuluh"  => $this->db->get('penyuluh')->num_rows(),
            "lahan"  => $this->db->get('lahan')->num_rows(),
            "poktan"  => $this->db->get('kelompok_tani')->num_rows(),
            "user"  => $this->db->get('user')->num_rows(),

        ];

        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('index', $data);
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
