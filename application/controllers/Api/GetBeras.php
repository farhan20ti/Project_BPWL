<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class GetBeras extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
        $this->load->database();
		$this->load->model('api_model');
		 date_default_timezone_set('Asia/Jakarta');
	}

	public function index_get()
	{
		$id = $this->get('id');
		$beras= [
			'beras' => $this->api_model->getBeras(),
			'allberas' => $this->api_model->getAllBeras(),
			'pulenberas' => $this->api_model->getPulenBeras(),
			'biasaberas' => $this->api_model->getBiasaBeras(),
			'semuaberas' => $this->api_model->getSemuaBeras($id)
		];
		$this->response($beras);
	}
}