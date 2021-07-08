<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class home extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->model('beras_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index_get()
    {
        $home = [
            'data' => $this->home_model->home(),
        ];

        $this->response($home);
    }
}

/* End of file promocode.php */
/* Location: ./application/controllers/promocode.php */