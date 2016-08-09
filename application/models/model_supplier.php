<?php

class Model_Supplier extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }
    
    public function get_all_town() {
        return $this->db->get('regencies')->result_array();
    }

    public function get_all_supplier() {
        $myArr = array('supplier_status' => 1);
        $this->db->where($myArr);
        return $this->db->get('supplier')->result_array();
    }

    public function get_supplier($id) {
        $this->db->where('supplier_id', $id);
        return $this->db->get('supplier')->result_array();
    }

    public function insert_supplier($nama, $alamat, $kota, $telp1, $telp2) {
        $myArr = array(
            'supplier_nama' => $nama,
            'supplier_alamat' => $alamat,
            'supplier_kota' => $kota,
            'supplier_telp1' => $telp1,
            'supplier_telp2' => $telp2,
            'supplier_status' => 1
        );

        $this->db->insert('supplier', $myArr);

        return $this->db->affected_rows();
    }

    public function update_supplier($id, $nama, $alamat, $kota, $telp1, $telp2) {
        $myArr = array(
            'supplier_nama' => $nama,
            'supplier_alamat' => $alamat,
            'supplier_kota' => $kota,
            'supplier_telp1' => $telp1,
            'supplier_telp2' => $telp2,
            'supplier_status' => 1
        );

        $this->db->where('supplier_id', $id);
        $this->db->update('supplier', $myArr);

        return $this->db->affected_rows();
    }

    public function delete_supplier($id) {
        $myArr = array(
            'supplier_status' => 0
        );

        $this->db->where('supplier_id', $id);
        $this->db->update('supplier', $myArr);

        return $this->db->affected_rows();
    }

}

?>