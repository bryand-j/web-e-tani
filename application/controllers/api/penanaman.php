<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class penanaman extends REST_Controller
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model('M_penanaman', 'Tanam');
		$this->load->model('M_post', 'Insert');
	}

	public function index_get()
	{
		if ($this->Tanam->get()->num_rows() > 0) {
			$this->set_response([
				'status' => TRUE,
				'data' => $this->Tanam->get()->result(),
			], REST_Controller::HTTP_OK);
		} else {
			$this->set_response([
				'status' => FALSE,
				'Message' => "Tidak Ada Data.!",
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_post()
	{

		$target_dir = "./assets/doc/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
			$data = [
				'id_kelompok_tani' => $this->post('kelompok_tani'),
				'id_lahan' => $this->post('lahan'),
				'jenis_tanaman' => $this->post('jenis_tanaman'),
				'nama_tanaman' => $this->post('nama_tanaman'),
				'tgl_tanam' => $this->post('tgl_tanam'),
				'perkiraan_tgl_panen' => $this->post('perkiraan_panen'),
				'jumlah_tanam' => $this->post('jumlah').' '.$this->post('satuan') ,
				'status_penanaman' => $this->post('status_penanaman'),
				'kebutuhan' => $this->post('kebutuhan'),
				'estimasi_biaya' => $this->post('estimasi_biaya'),
				'lokasi' => $this->post('lokasi'),
				'foto' => $_FILES['foto']['name'],
			];
			$this->form_validation->set_data($data);
			$this->form_validation->set_rules('id_kelompok_tani', 'kelompok tani', 'required');
			$this->form_validation->set_rules('id_lahan', 'Lahan', 'required');
			$this->form_validation->set_rules('jenis_tanaman', 'Jenis Tanaman', 'required');
			$this->form_validation->set_rules('nama_tanaman', 'Nama Tanaman', 'required');
			$this->form_validation->set_rules('tgl_tanam', 'Tanggal Tanam', 'required');
			$this->form_validation->set_rules('perkiraan_tgl_panen', 'Perkiraan Tanggal Panen', 'required');
			$this->form_validation->set_rules('jumlah_tanam', 'Jumlah Tanam', 'required');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

			$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
			if ($this->form_validation->run() == FALSE) {

				$message = [
					"status" => false,
					"message" => validation_errors('-', ' '),
				];
				$this->response($message, REST_Controller::HTTP_OK);
			} else {

				$respon = $this->Insert->insert('penanaman', $data);
				$this->response($respon, REST_Controller::HTTP_OK);
			}
		}
	}
}
