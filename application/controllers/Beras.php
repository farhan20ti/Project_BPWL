<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beras extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'appBar' => 'Berasku'
        ];
        $this->load->view('index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'appBar' => 'Profil'
        ];
        $this->load->view('pages/profile.php', $data);
    }

    public function header()
    {
        $this->load->view('partials/header.php');
    }
}
