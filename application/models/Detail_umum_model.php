<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_umum_model extends CI_Model {

    public function get_data()
    {
        {
            $this->db->select('
              kate_produk.*, d_produk.nama as detail
            ');
            $this->db->join('d_produk', 'kate_produk.kode = d_produk.kode');
            $this->db->from('kate_produk');
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}