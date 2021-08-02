<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class GetUser extends REST_Controller
{
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
		// if ($id) {
		// 	$userpage = $this->api_model->getUserPage($id)
		// }
		$user = [
			'credentials' => $this->api_model->getUser(),
			'userpage' => $this->api_model->getUserPage($id),
		];
		$this->response($user);
	}
}
