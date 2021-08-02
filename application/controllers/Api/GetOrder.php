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
		$id = $_GET['id'];
		$order= [
			'order' => $this->api_model->getEveryBeras($id),
		];
		$this->response($beras);
	}
}