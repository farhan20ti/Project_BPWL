<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class InsertUser extends REST_Controller {
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
		$path = realpath(".");
        $path .= "/assets/uploaded/user/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('ktp');

        $gambarktp = $this->upload->data('file_name');
        $id = $this->api_model->selectLastUser();
		$convert = explode("-", $id[0]['id_user']);
		if (empty($convert)) {
			$newid = "U-1";
		} else {
			$newid = "U-".($convert[1]+1);
		}
		

		$data = [
			'id_user' => $newid,
            'nama_user' => $this->post('nama'),
            'email_user' => $this->post('email'),
            'no_hp_user' => $this->post('nohp'),
            'alamat_user' => $this->post('alamat'),
            'username' => $this->post('uname'),
            'pass_user' => md5($this->post('pw')),
            'ktp_user' => $gambarktp,
        ];
        $this->api_model->insertUser($data);
        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}