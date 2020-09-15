<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function index()
    {

        $this->load->view('login2');
    }
    public function in()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $data = $this->db->get('admin');
        if ($data->num_rows() > 0) {
            $array = array(
                'nama' => $data->row()->nama,
                'username' => $data->row()->username,
                'id' => $data->row()->id
            );
            $this->session->set_userdata($array);
            redirect(base_url('index'), 'refresh');
        } else {
            $this->session->set_flashdata('pesan', 'Username Atau Password Salah! , Coba Lagi');
            redirect(base_url('login'));
        }
    }
    public function out()
    {
        $this->session->set_userdata('username', FALSE);
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file login.php */
