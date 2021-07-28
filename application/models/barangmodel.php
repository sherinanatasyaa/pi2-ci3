<?php

class barangmodel extends CI_Model
{
        public $barang_id;
        public $nama_barang;
        public $harga_barang;
        public $stok;
        public $keterangan;

    public function get_all_data_barang()
    {
        $query = "SELECT * FROM barang";
        return $this->db->query($query)->result_array();
    }

    public function simpan_barang()
    {
        
    }
}

?>