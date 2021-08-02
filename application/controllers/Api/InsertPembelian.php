<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class InsertPembelian extends REST_Controller {
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
        $id = $this->api_model->selectLastPembelian();
		$convert = explode("-", $id[0]['id_transaksi']);
		if (empty($convert)) {
			$newid = "PMB-1";
		} else {
			$newid = "PMB-".($convert[1]+1);
		}
		$this->api_model->decreaseStokBeras($this->post('idberas'),$this->post('jml_beli'));
		$data = [
			'id_transaksi' => $newid,
            'id_beras' => $this->post('idberas'),
            'id_user' => $this->post('iduser'),
            'tgl_beli' => $this->post('tgl_beli'),
            'jml_beli' => $this->post('jml_beli'),
            'total_harga' => $this->post('total_harga'),
            'metode_pembayaran' => $this->post('metode_pembayaran'),
            'jenis_pembayaran' => $this->post('jenis_pembayaran'),
            'setor1' => null,
            'setor2' => null,
            'setor3' => null,
            'metode_penerimaan' => $this->post('pengamberas'),
            'status' => $this->post('status'),
            'no_rekening' => $this->post('no_rekening')
        ];
        $this->api_model->insertPembelian($data);
        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}