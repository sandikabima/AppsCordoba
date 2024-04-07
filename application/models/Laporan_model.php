<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_data($id)
    {
        {
            $this->db->select("penjualan.*, detail_penjualan.* FROM penjualan JOIN detail_penjualan ON penjualan.faktur = detail_penjualan.faktur where penjualan.faktur='$id'");
            $query = $this->db->get();
            return $query->result();
        }
    }

}