<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pos_reseller_model extends CI_Model {

    public function get_data()
    {
        {
            $this->db->select('
              kate_reseller.*, d_reseller.nama as detail
            ');
            $this->db->join('d_reseller', 'kate_reseller.kode = d_reseller.kode');
            $this->db->from('kate_reseller');
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function faktur($table)
    {
        return $this->db->get($table);
    }

    public function total()
    {
            $query = $this->db->query("SELECT SUM(harga) as total
            FROM sementara");
            return $query->result();
    }

    public function get_keranjang($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert_data_detail_penjualan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function belanja($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data_sementara()
    {
        $this->db->empty_table('sementara');
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function faktur_edit($f_faktur, $table)
    {
        $this->db->where('id',1);
        $this->db->update($table, $f_faktur);
    }
}