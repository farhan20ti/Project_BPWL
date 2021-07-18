<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('admin/admin');
    }

    public function charts()
    {
        $this->load->view('admin/charts');
    }

    public function tables()
    {
        $this->load->view('admin/tables');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->login();
    }

    public function register()
    {
        $this->load->view('admin/register');
    }

    public function tambahBeras()
    {
        $this->load->view('admin/tambahBeras');
    }

    public function editBeras()
    {
        $this->load->view('admin/editDataBeras.php');
    }

    public function tambahUser()
    {
        $this->load->view('admin/tambahUser.php');
    }

    public function editUser()
    {
        $this->load->view('admin/editDataUser.php');
    }

    public function tambahAppointment()
    {
        $this->load->view('admin/tambahAppoinment.php');
    }

    public function editAppointment()
    {
        $this->load->view('admin/editDataAppoinment.php');
    }

    public function tambahKurir()
    {
        $this->load->view('admin/tambahKurir.php');
    }

    public function editKurir()
    {
        $this->load->view('admin/editDataKurir.php');
    }

    public function tambahDikirim()
    {
        $this->load->view('admin/tambahDikirim.php');
    }

    public function editDikirim()
    {
        $this->load->view('admin/editDataDikirim.php');
    }
}
