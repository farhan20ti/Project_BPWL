<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser(){
    	$query = $this->db->query("SELECT id_user, username, pass_user, nama_user, no_hp_user FROM pengguna");
    	return $query->result_array();
    }

    public function getUserPage($id){
        $query = $this->db->query("SELECT * FROM pengguna WHERE id_user = '$id'");
        return $query->result_array();
    }

    public function getBeras(){
    	$query = $this->db->query("SELECT id_beras, nama_beras, harga_beras, gambar_beras FROM beras ORDER BY id_beras LIMIT 3");
    	return $query->result_array();
    }

    public function getAllBeras(){
    	$query = $this->db->query("SELECT id_beras, nama_beras, harga_beras, gambar_beras FROM beras ORDER BY id_beras");
    	return $query->result_array();
    }

    public function getSemuaBeras($id){
        $query = $this->db->query("SELECT * FROM beras WHERE id_beras='$id'");
        return $query->result_array();
    }

    public function getPulenBeras(){
        $query = $this->db->query("SELECT id_beras, nama_beras, harga_beras, gambar_beras FROM beras WHERE jenis_beras = 'Pulen' ORDER BY id_beras");
        return $query->result_array();
    }

    public function getBiasaBeras(){
        $query = $this->db->query("SELECT id_beras, nama_beras, harga_beras, gambar_beras FROM beras WHERE jenis_beras = 'Biasa' ORDER BY id_beras");
        return $query->result_array();
    }

    public function getBerasData(){
    	$query = $this->db->query("SELECT id_beras, nama_beras, harga_beras, gambar_beras FROM beras ORDER BY id_beras");
    	return $query->result_array();
    }

    public function selectLastUser(){
        $query = $this->db->query("SELECT id_user FROM pengguna ORDER BY id_user DESC LIMIT 1");
        return $query->result_array();
    }

    public function selectLastPembelian(){
        $query = $this->db->query("SELECT id_transaksi FROM pembelian ORDER BY id_transaksi DESC LIMIT 1");
        return $query->result_array();
    }

    public function selectLastPengiriman(){
        $query = $this->db->query("SELECT id_pengiriman FROM pengiriman ORDER BY id_pengiriman DESC LIMIT 1");
        return $query->result_array();
    }


    public function selectRandomKurir(){
        $query = $this->db->query("SELECT id_kurir FROM kurir ORDER BY RAND() LIMIT 1");
        return $query->result_array();
    }

    public function decreaseStokBeras($id, $jmlbeli){
        $query = $this->db->query("SELECT stok_beras FROM beras WHERE id_beras = '$id'");
        $query2 = $query->result_array();
        $stokNew = $query2[0]['stok_beras'] - $jmlbeli;
        $data = [
            'stok_beras' => $stokNew,
        ];
        $this->db->where('id_beras',$id);
        $this->db->update('Beras', $data);
    }

    public function insertUser($data){
        $this->db->insert('Pengguna', $data);
    }

    public function insertPembelian($data){
        $this->db->insert('Pembelian', $data);
    }

    public function insertPengiriman($data){
        $this->db->insert('Pengiriman', $data);
    }

}