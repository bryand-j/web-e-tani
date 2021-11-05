<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lahan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  
        $this->load->model('M_lahan');
        if (empty($this->session->userdata('id'))) {

            redirect('login', 'refresh');
        }
    }

    // List all your items
    public function index()
    {

        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('lahan');
    }
    public function getData()
    {
        $data = $this->M_lahan->getLahan()->result();
        $output = array();
        $no = 0;
        foreach ($data as $key) {
            $row = array();
            $no++;
            $row[] = $key->id;
            $row[] = $no;
            $row[] = $key->nama_pemilik;
            $row[] = $key->luas;
            $row[] = $key->satuan;
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
    public function update()
    {
        $data = [
            "nama_pemilik" => $this->input->post('nama_pemilik'),
            "luas" => $this->input->post('luas'),
            "satuan" => $this->input->post('satuan'),
        ];
        $id = $this->input->post('id');
        $edit = $this->M_lahan->editLahan($data, $id);
        echo json_encode($edit);
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $id = $this->input->get('id');
        $hapus = $this->M_lahan->deletelahan($id);
        echo json_encode($hapus);
    }
}

/* End of file Controllername.php */
