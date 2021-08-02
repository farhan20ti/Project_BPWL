<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class InsertPengiriman extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
        $this->load->database();
        $this->load->model('api_model');
		 date_default_timezone_set('Asia/Jakarta');
	}

	public function index_post()
	{
        $id = $this->api_model->selectLastPengiriman();
		$convert = explode("-", $id[0]['id_pengiriman']);
		if (empty($convert)) {
			$newid = "P-1";
		} else {
			$newid = "P-".($convert[1]+1);
		}
        $idkurirmentah = $this->api_model->selectRandomKurir();
        $idkurir = $idkurirmentah[0]['id_kurir'];
		$data = [
			'id_pengiriman' => $newid,
            'id_beras' => $this->post('idberas'),
            'id_user' => $this->post('iduser'),
            'id_kurir' => $idkurir,
            'tgl_kirim' => $this->post('tgl_kirim'),
            'status' => $this->post('status'),
        ];
        $this->api_model->insertPengiriman($data);
        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}