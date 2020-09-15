<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  
        $this->load->model('M_user');
    }

    // List all your itemsa
    public function index($offset = 0)
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('user');
    }
    public function getData()
    {
        $data = $this->M_user->getUser()->result();
        $output = array();
        $no = 0;
        foreach ($data as $key) {
            $row = array();
            $no++;
            $row[] = $key->id;
            $row[] = $no;
            $row[] = $key->nama;
            $row[] = $key->golongan;
            $row[] = $key->tempat_lahir;
            $row[] = $key->tgl_lahir;
            $row[] = $key->agama;
            $row[] = $key->jenis_kelamin;
            $row[] = $key->password;
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
            "nama" => $this->input->post('nama'),
            "golongan" => $this->input->post('golongan'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "agama" => $this->input->post('agama'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "password" => $this->input->post('password'),
        ];
        if ($this->input->post('id') != '') {

            $id = $this->input->post('id');
            $edit = $this->M_user->editUser($data, $id);
            echo json_encode($edit);
        } else {
            $add = $this->M_user->insert('user', $data);
            echo json_encode($add);
        }
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $id = $this->input->get('id');
        $hapus = $this->M_user->deleteuser($id);
        echo json_encode($hapus);
    }
}

/* End of file Controllername.php */
