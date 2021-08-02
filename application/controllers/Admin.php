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
        $this->load->model('admin_model');
        $this->load->helper(array('form', 'url'));
        if($this->session->userdata('status') != "login"){
            redirect('LoginAdmin');
        }
    }

    public function index()
    {
        $data = [
            'showBeras' => $this->admin_model->showBeras(),
            'showKurir' => $this->admin_model->showKurir(),
            'showUser' => $this->admin_model->showUser(),
            'showPengiriman' => $this->admin_model->showPengiriman(),
            'showPembelian' => $this->admin_model->showPembelian(),
        ];
        $this->load->view('admin/admin', $data);
    }

    public function addBeras(){
        $this->admin_model->addBeras();
        redirect('Admin','refresh');
    }

    public function addUser(){
        $this->admin_model->addUser();
        redirect('Admin','refresh');
    }

    public function addKurir(){
        $this->admin_model->addKurir();
        redirect('Admin','refresh');
    }

    public function addPengiriman(){
        $this->admin_model->addPengiriman();
        redirect('Admin','refresh');
    }

    public function addPembelian(){
        $this->admin_model->addPembelian();
        redirect('Admin','refresh');
    }

    public function charts()
    {
        $this->load->view('admin/charts');
    }

    public function tables()
    {
        $this->load->view('admin/tables');
    }

    public function logout()
    {            
        $this->session->sess_destroy();
        redirect('LoginAdmin');
    }

    public function register()
    {
        $this->load->view('admin/register');
    }

    public function tambahBeras()
    {
        $this->load->view('admin/tambahBeras');
    }

    public function editBeras($id)
    {
        $data['edit'] = $this->admin_model->editBeras($id);
        $this->load->view('admin/editDataBeras.php', $data);
    }

    public function updateBeras()
    {
        $this->admin_model->updateBeras();
        redirect('Admin','refresh');
    }

    public function updatePembelian()
    {
        $this->admin_model->updatePembelian();
        redirect('Admin','refresh');
    }

    public function updateUser()
    {
        $this->admin_model->updateUser();
        redirect('Admin','refresh');
    }

    public function updateKurir()
    {
        $this->admin_model->updateKurir();
        redirect('Admin','refresh');
    }

    public function updateDikirim()
    {
        $this->admin_model->updateDikirim();
        redirect('Admin','refresh');
    }

    public function deleteBeras($id)
    {
        $this->admin_model->deleteBeras($id);
        redirect('Admin','refresh');
    }

     public function deleteUser($id)
    {
        $this->admin_model->deleteUser($id);
        redirect('Admin','refresh');
        
    }

     public function deleteAppointment($id)
    {
        $this->admin_model->deleteAppointment($id);
        redirect('Admin','refresh');
        
    }

    public function deleteKurir($id)
    {
        $this->admin_model->deleteKurir($id);
        redirect('Admin','refresh');
    }

    public function deleteDikirim($id)
    {
        $this->admin_model->deleteDikirim($id);
        redirect('Admin','refresh');
    }

    public function tambahUser()
    {
        $this->load->view('admin/tambahUser.php');
    }

    public function editUser($id)
    {
        $data['edit'] = $this->admin_model->editUser($id);
        $this->load->view('admin/editDataUser.php', $data);
    }

    public function tambahAppointment()
    {
        $data = [
            'userId' => $this->admin_model->getUserId(),
            'berasId' => $this->admin_model->getBerasId()
        ];
        $this->load->view('admin/tambahAppoinment.php', $data);
    }

    public function getHargaBeras(){
        $id = $_POST['idberas'];
        $data['hargaBeras'] = $this->admin_model->getHargaBeras($id);
        echo $data['hargaBeras'][0]['harga_beras'];
    }

    public function editAppointment($id)
    {   
        $data = [
            'getAppointment' => $this->admin_model->editAppointment($id),
            'userId' => $this->admin_model->getUserId(),
            'berasId' => $this->admin_model->getBerasId()
        ];
        $this->load->view('admin/editDataAppoinment.php', $data);
    }

    public function tambahKurir()
    {
        $this->load->view('admin/tambahKurir.php');
    }

    public function editKurir($id)
    {   
        $data['edit'] = $this->admin_model->editKurir($id);
        $this->load->view('admin/editDataKurir.php', $data);
    }

    public function tambahDikirim()
    {
        $data = [
            'userId' => $this->admin_model->getUserId(),
            'berasId' => $this->admin_model->getBerasId(),
            'kurirId' =>$this->admin_model->getKurirId(),
        ];
        $this->load->view('admin/tambahDikirim.php', $data);
    }

    public function editDikirim($id)
    {
        $data = [
            'id_tgl' => $this->admin_model->getIdTanggal($id),
            'userId' => $this->admin_model->getUserId(),
            'berasId' => $this->admin_model->getBerasId(),
            'kurirId' =>$this->admin_model->getKurirId(),
        ];
        $this->load->view('admin/editDataDikirim.php', $data);
    }
}
