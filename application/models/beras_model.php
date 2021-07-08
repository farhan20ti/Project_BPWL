<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class beras_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function home()
    {
        $query = $this->db->query('SELECT * FROM beras');
        return $query->result_array();
    }
}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */