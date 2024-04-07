<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}