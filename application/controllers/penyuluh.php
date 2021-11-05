<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penyuluh extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  
        $this->load->model('M_penyuluh');
        $this->load->helper('comp');

        if (empty($this->session->userdata('id'))) {

            redirect('login', 'refresh');
        }
    }

    // List all your items
    public function index($offset = 0)
    {

        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('penyuluh');
    }
    public function getData()
    {
        $data = $this->M_penyuluh->getPenyuluh()->result();
        $output = array();
        $no = 0;
        foreach ($data as $key) {
            $row = array();
            $no++;
            $row[] = $key->id;
            $row[] = $no;
            $row[] = $key->nama_penyuluh;
            $row[] = $key->golongan;
            $row[] = $key->tempat_lahir;
            $row[] = $key->tgl_lahir;
            $row[] = $key->jenis_kelamin;
            $row[] = $key->agama;
            $row[] = $key->keterangan;
            $row[] = compStatus($key->status, $key->alasan);
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

    //Update one item
    public function update()
    {
        $data = [
            "nama_penyuluh" => $this->input->post('nama_penyuluh'),
            "golongan" => $this->input->post('golongan'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "agama" => $this->input->post('agama'),
            "keterangan" => $this->input->post('keterangan'),
            "status" => $this->input->post('status'),
            "alasan" => $this->input->post('alasan'),
        ];
        $id = $this->input->post('id');
        $edit = $this->M_penyuluh->editPenyuluh($data, $id);
        echo json_encode($edit);
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $id = $this->input->get('id');
        $hapus = $this->M_penyuluh->deletepenyuluh($id);
        echo json_encode($hapus);
    }
}

/* End of file Controllername.php */
