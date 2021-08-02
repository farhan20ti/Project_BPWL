<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     public function getUser(){
        $query = $this->db->query("SELECT username, password FROM user");
        return $query->result_array();
    }

    public function showBeras()
    {
        $query = $this->db->query('SELECT * FROM beras');
        return $query->result_array();
    }

     public function showUser()
    {
        $query = $this->db->query('SELECT * FROM pengguna');
        return $query->result_array();
    }

    public function showPembelian()
    {
        $query = $this->db->query('SELECT * FROM pembelian');
        return $query->result_array();
    }

    public function showKurir()
    {
        $query = $this->db->query('SELECT * FROM kurir');
        return $query->result_array();
    }

    public function showPengiriman()
    {
        $query = $this->db->query('SELECT * FROM pengiriman');
        return $query->result_array();
    }

    public function addBeras(){
        $path = realpath(".");
        $path .= "/assets/uploaded/beras/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload("gambarberas")){
               echo $this->upload->display_errors();
        } else{
            $gambarberas = $this->upload->data('file_name'); 
        } 
        $data = [
            'id_beras' => $this->input->post('idberas'),
            'nama_beras' => $this->input->post('namaberas'),
            'asal_beras' => $this->input->post('asalberas'),
            'jenis_beras' => $this->input->post('typeberas'),
            'harga_beras' => $this->input->post('hargaberas'),
            'stok_beras' => $this->input->post('stokberas'),
            'gambar_beras' => $gambarberas
        ];
        $this->db->insert('Beras',$data);
    }

    public function addUser(){
        $path = realpath(".");
        $path .= "/assets/uploaded/user/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload("fotoprofile")){
            $gambarprofile = null;
        } else{
            $gambarprofile = $this->upload->data('file_name'); 
        } 
        if ( !$this->upload->do_upload("fotoktp")){
             echo $this->upload->display_errors();
        } else{
            $gambarktp = $this->upload->data('file_name'); 
        } 
        $data = [
            'id_user' => $this->input->post('iduser'),
            'nama_user' => $this->input->post('namauser'),
            'email_user' => $this->input->post('emailuser'),
            'no_hp_user' => $this->input->post('nohpuser'),
            'alamat_user' => $this->input->post('alamatuser'),
            'username' => $this->input->post('username'),
            'pass_user' => md5($this->input->post('passworduser')),
            'profile_user' => $gambarprofile,
            'ktp_user' => $gambarktp,
        ];
        $this->db->insert('Pengguna',$data);
    }

     public function addKurir(){
        $data = [
            'id_kurir' => $this->input->post('idkurir'),
            'nama_kurir' => $this->input->post('namakurir'),
            'no_hp' => $this->input->post('nohp')
        ];
        $this->db->insert('Kurir',$data);
    }

    public function addPembelian(){
        $idberas = $this->input->post('idberas');
        $getStok = $this->db->query("SELECT stok_beras FROM beras WHERE id_beras = '$idberas'");
        $resStok = $getStok->result_array();
        $harga = explode(",", $this->input->post('harga'));
        $hargafinal = implode("", $harga);
        $data2 = [
            'stok_beras' => $resStok[0]['stok_beras'] - $this->input->post('jmlbeli'),
        ];
        $data = [
            'id_transaksi' => $this->input->post('idtransaksi'),
            'id_beras' => $this->input->post('idberas'),
            'id_user' => $this->input->post('iduser'),
            'jml_beli' => $this->input->post('jmlbeli'),
            'tgl_beli' => $this->input->post('tglbeli'),
            'total_harga' => $hargafinal,
            'metode_pembayaran' => $this->input->post('metodepembayaran'),
            'jenis_pembayaran' => $this->input->post('jenispembayaran'),
            'setor1' => $this->input->post('setor1'),
            'setor2' => $this->input->post('setor2'),
            'setor3' => $this->input->post('setor3'),
            'metode_penerimaan' => $this->input->post('penerimaan'),
            'status' => $this->input->post('status'),
            'no_rekening' => $this->input->post('norek'),
        ];
        $this->db->insert('Pembelian',$data);
        $this->db->where('id_beras',$this->input->post('idberas'));
        $this->db->update('Beras', $data2);
    }

    public function addPengiriman(){
        $data = [
            'id_pengiriman' => $this->input->post('idpengiriman'),
            'id_beras' => $this->input->post('idberas'),
            'id_user' => $this->input->post('iduser'),
            'id_kurir' => $this->input->post('idkurir'),
            'tgl_kirim' => $this->input->post('tglbeli'),
            'status' => $this->input->post('status')
        ];
        $this->db->insert('Pengiriman',$data);
    }

    public function editBeras($id){
        $query = $this->db->query("SELECT * FROM beras WHERE id_beras = '$id'");
        return $query->result_array();
    }

    public function editAppointment($id){
        $query = $this->db->query("SELECT id_transaksi, tgl_beli, jml_beli, total_harga FROM pembelian WHERE id_transaksi = '$id'");
        return $query->result_array();
    }

    public function editKurir($id){
        $query = $this->db->query("SELECT * FROM kurir WHERE id_kurir = '$id'");
        return $query->result_array();
    }

    public function editUser($id){
        $query = $this->db->query("SELECT * FROM pengguna WHERE id_user = '$id'");
        return $query->result_array();
    }

    public function updateBeras(){
        $path = realpath(".");
        $path .= "/assets/uploaded/beras/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( $this->upload->do_upload("gambarberas")){
            $quer = $this->input->post('idberas');
            $query = $this->db->query("SELECT gambar_beras FROM beras WHERE id_beras = '$quer'");
            $res = $query->result_array();
            unlink($path.$res[0]['gambar_beras']);
            $gambarberas = $this->upload->data('file_name'); 
             $data = [
            'nama_beras' => $this->input->post('namaberas'),
            'asal_beras' => $this->input->post('asalberas'),
            'jenis_beras' => $this->input->post('typeberas'),
            'harga_beras' => $this->input->post('hargaberas'),
            'stok_beras' => $this->input->post('stokberas'),
            'gambar_beras' => $gambarberas
            ];
        } else {
             $data = [
            'nama_beras' => $this->input->post('namaberas'),
            'asal_beras' => $this->input->post('asalberas'),
            'jenis_beras' => $this->input->post('typeberas'),
            'harga_beras' => $this->input->post('hargaberas'),
            'stok_beras' => $this->input->post('stokberas')
            ];
        }
        $this->db->where('id_beras',$this->input->post('idberas'));
        $this->db->update('Beras', $data);
    }

    public function updateUser(){
        $path = realpath(".");
        $path .= "/assets/uploaded/user/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpeg|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $quer = $this->input->post('iduser');
        if ( $this->upload->do_upload("fotoprofile")){
            $query = $this->db->query("SELECT profile_user FROM pengguna WHERE id_user = '$quer'");
            $res = $query->result_array();
            if (!$res[0]['profile_user'] == null) {
                unlink($path.$res[0]['profile_user']);
            }
            $gambarprofile = $this->upload->data('file_name'); 
        } else {
            $query = $this->db->query("SELECT profile_user FROM pengguna WHERE id_user = '$quer'");
            $res = $query->result_array();
            $gambarprofile = $res[0]['profile_user'];
        }
        if ( $this->upload->do_upload("fotoktp")){
            $query = $this->db->query("SELECT ktp_user FROM pengguna WHERE id_user = '$quer'");
            $res = $query->result_array();
            unlink($path.$res[0]['ktp_user']);
            $gambarktp = $this->upload->data('file_name'); 
        } else {
            $query = $this->db->query("SELECT ktp_user FROM pengguna WHERE id_user = '$quer'");
            $res = $query->result_array();
            $gambarktp = $res[0]['ktp_user'];
        }
        $data = [
            'id_user' => $this->input->post('iduser'),
            'nama_user' => $this->input->post('namauser'),
            'alamat_user' => $this->input->post('alamatuser'),
            'email_user' => $this->input->post('emailuser'),
            'no_hp_user' => $this->input->post('nohpuser'),
            'alamat_user' => $this->input->post('alamatuser'),
            'username' => $this->input->post('username'),
            'pass_user' => $this->input->post('passworduser'),
            'profile_user' => $gambarprofile,
            'ktp_user' => $gambarktp,
        ];
        $this->db->where('id_user',$this->input->post('iduser'));
        $this->db->update('pengguna', $data);
    }

    public function updateKurir(){
             $data = [
            'nama_kurir' => $this->input->post('namakurir'),
            'no_hp' => $this->input->post('nohp'),
            ];
        $this->db->where('id_kurir',$this->input->post('idkurir'));
        $this->db->update('Kurir', $data);
    }

    public function updateDikirim(){
             $data = [
            'id_beras' => $this->input->post('idberas'),
            'id_user' => $this->input->post('iduser'),
            'id_kurir' => $this->input->post('idkurir'),
            'tgl_kirim' => $this->input->post('tglbeli'),
            'status' => $this->input->post('status')
            ];
        $this->db->where('id_pengiriman',$this->input->post('idpengiriman'));
        $this->db->update('Pengiriman', $data);
    }

    public function updatePembelian(){
        $jmlLama = $this->input->post('jmlLama');
        $jmlBaru = $this->input->post('jmlbeli');
        $idberas = $this->input->post('idberas');
        $getStok = $this->db->query("SELECT stok_beras FROM beras WHERE id_beras = '$idberas'");
        $resStok = $getStok->result_array();
        if ($jmlLama > $jmlBaru) {
            $selisih = $jmlLama - $jmlBaru;
             $data2 = [
                'stok_beras' => $resStok[0]['stok_beras'] + $selisih,
            ];
        } else {
            $selisih = $jmlBaru - $jmlLama;
             $data2 = [
                'stok_beras' => $resStok[0]['stok_beras'] - $selisih,
            ];
        }
        $harga = explode(",", $this->input->post('harga'));
        $hargafinal = implode("", $harga);
         $data = [
        'id_beras' => $this->input->post('idberas'),
        'id_user' => $this->input->post('iduser'),
        'jml_beli' => $this->input->post('jmlbeli'),
        'tgl_beli' => $this->input->post('tglbeli'),
        'total_harga' => $hargafinal,
        'metode_pembayaran' => $this->input->post('metodepembayaran'),
        'jenis_pembayaran' => $this->input->post('jenispembayaran'),
        'setor1' => $this->input->post('setor1'),
        'setor2' => $this->input->post('setor2'),
        'setor3' => $this->input->post('setor3'),
        'metode_penerimaan' => $this->input->post('penerimaan'),
        'status' => $this->input->post('status'),
        'no_rekening' => $this->input->post('norek'),
        ];
        $this->db->where('id_transaksi',$this->input->post('idtransaksi'));
        $this->db->update('Pembelian', $data);
        $this->db->where('id_beras',$this->input->post('idberas'));
        $this->db->update('Beras', $data2);
    }

    public function deleteBeras($id){
        $path = realpath(".");
        $path .= "/assets/uploaded/beras/";
        $queryDel = $this->db->query("SELECT gambar_beras FROM beras WHERE id_beras = '$id'");
        $res = $queryDel->result_array();
        unlink($path.$res[0]['gambar_beras']);
        $query = $this->db->query("DELETE FROM Beras WHERE id_beras = '$id'");
    }

    public function deleteUser($id){
        $path = realpath(".");
        $path .= "/assets/uploaded/user/";
        $queryDel = $this->db->query("SELECT profile_user FROM pengguna WHERE id_user = '$id'");
        $queryDel2 = $this->db->query("SELECT ktp_user FROM pengguna WHERE id_user = '$id'");
        $res = $queryDel->result_array();
        $res2 = $queryDel2->result_array();
        unlink($path.$res[0]['profile_user']);
        unlink($path.$res2[0]['ktp_user']);
        $query = $this->db->query("DELETE FROM Pengguna WHERE id_user = '$id'");
    }

    public function deleteKurir($id){
        $query = $this->db->query("DELETE FROM Kurir WHERE id_kurir = '$id'");
    }

    public function deleteAppointment($id){
        $query = $this->db->query("DELETE FROM Pembelian WHERE id_transaksi = '$id'");
    }

    public function deleteDikirim($id){
        $query = $this->db->query("DELETE FROM Pengiriman WHERE id_pengiriman = '$id'");
    }

    public function getUserId(){
        $query = $this->db->query("SELECT id_user FROM pengguna");
        return $query->result_array();
    }

    public function getBerasId(){
       $query = $this->db->query("SELECT id_beras FROM beras");
       return $query->result_array();
    }

    public function getKurirId(){
        $query = $this->db->query("SELECT id_kurir FROM kurir");
        return $query->result_array();
    }

    public function getIdTanggal($id){
        $query = $this->db->query("SELECT id_pengiriman, tgl_kirim FROM pengiriman WHERE id_pengiriman = '$id'");
        return $query->result_array();
    }

    public function getHargaBeras($id){
        $query = $this->db->query("SELECT harga_beras FROM beras WHERE id_beras = '$id'");
        return $query->result_array();
    }

    public function getUserPass(){
        $query = $this->db->query("SELECT username, password FROM admin");
        return $query->result_array();
    }

    function cek_login($table,$where){      
        return $this->db->get_where($table,$where);
    }   
}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */