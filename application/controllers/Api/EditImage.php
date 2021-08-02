<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class EditImage extends REST_Controller {
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
        $id = $this->post('id');
		$path = realpath(".");
        $path .= "/assets/uploaded/user/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('img-profile')){
            $query = $this->db->query("SELECT profile_user FROM pengguna WHERE id_user = '$id'");
            $res = $query->result_array();
            if (!$res[0]['profile_user'] == null) {
                unlink($path.$res[0]['profile_user']);
            }
            $gambarprofile = $this->upload->data('file_name'); 
        }

		$data = [
			'profile_user' => $gambarprofile,
        ];
        $this->db->where('id_user',$id);
        $this->db->update('pengguna', $data);
        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}