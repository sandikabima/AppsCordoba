<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_reseller_model extends CI_Model {

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

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}