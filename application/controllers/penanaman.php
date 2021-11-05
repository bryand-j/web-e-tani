<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penanaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies  $this->load->model('M_index','i');
        $this->load->model('M_penanaman', 'tanaman');
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
        $this->load->view('penanaman');
    }
    public function getData()
    {
        $data = $this->tanaman->getData()->result();
        $output = array();
        $no = 0;
        foreach ($data as $key) {
            $row = array();
            $no++;
            $est = ((int) $key->estimasi_biaya * 1 + 0);
            $row[] = $key->id;
            $row[] = $no;
            $row[] = $key->nama_poktan;
            $row[] = $key->nama_pemilik;
            $row[] = $key->jenis_tanaman;
            $row[] = $key->nama_tanaman;
            $row[] = $key->tgl_tanam;
            $row[] = $key->perkiraan_tgl_panen;
            $row[] = $key->jumlah_tanam;
            // $row[] = $key->jumlah_panen;
            $row[] = $key->status_penanaman;
            // $row[] = $key->realisasi_panen;
            $row[] = $key->kebutuhan;
            $row[] = number_format($est, 2, ',', '.');
            // $row[] = $key->realisasi_kebutuhan;
            $row[] = '<img height="100" width="100" src="' . base_url() . 'assets/doc/' . $key->foto . '" >';
            $row[] = $this->lokasi($key->lokasi);
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
    function lokasi($lokasi)
    {
        $loc = explode(',', $lokasi);
        return '<a href="https://www.google.com/maps?q=' . $loc[0] . ',' . $loc[1] . '" target="_blank">Lihat Lokasi</a>';
    }

    //Update one item
    public function update()
    {
        $data = [

            'tgl_tanam' => $this->input->post('tgl_tanam'),
            'perkiraan_tgl_panen' => $this->input->post('perkiraan_tgl_panen'),
            'jumlah_tanam' => $this->input->post('jumlah_tanam') . ' ' . $this->input->post('satuan'),

            'status_penanaman' => $this->input->post('status_penanaman'),
            'realisasi_panen' => $this->input->post('realisasi_panen'),
            'kebutuhan' => $this->input->post('kebutuhan'),
            'estimasi_biaya' => $this->input->post('estimasi_biaya'),
            'realisasi_kebutuhan' => $this->input->post('realisasi_kebutuhan'),
        ];
        $id = $this->input->post('id');
        $edit = $this->tanaman->edit($data, $id);
        echo json_encode($edit);
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $id = $this->input->get('id');
        $hapus = $this->tanaman->delete($id);
        echo json_encode($hapus);
    }

    public function report()
    {
        $tahun = $this->input->get('tahun');
        $data['tahun'] = $tahun;
        $this->db->select("p.*,l.nama_pemilik,k.nama_poktan");
        $this->db->from('penanaman p');
        $this->db->join('lahan l', 'p.id_lahan = l.id', 'left');
        $this->db->join('kelompok_tani k', 'k.id = p.id_kelompok_tani', 'left');
        $this->db->where('YEAR(p.tgl_tanam)', $tahun);
        $this->db->group_by('p.id');
        $this->db->order_by('tgl_tanam', 'DESC');
        $tb = $this->db->get();
        $data['tabel'] = $tb->result();
        if ($tb->num_rows() > 1) $this->load->view('laporan', $data);
        else echo "<script>alert('Tidak Ada Data Penanaman di Tanun " . $tahun . "')</script>";
    }
}
