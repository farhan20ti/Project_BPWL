<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginAdmin extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->helper(array('form', 'url'));
    }

     public function index()
    {
        $this->load->view('admin/login');
    }

    function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->admin_model->cek_login("Admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			$correct = 0;
			echo $correct;
		}else{
			$correct = 1;
			echo $correct;
		}
	}
}