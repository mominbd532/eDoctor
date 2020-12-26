<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_mo extends CI_Model
{
    public function site_details()
    {
        $res = $this->db->select('*')
            ->from('users')
            ->get()->result_array();
        return $res[0];
    }

    public function medicine_info_list(){
        $this->db->select('*');
        $this->db->from('medicines');
        $data = $this->db->get();
        return $data->result_array();

        $this->db->select('*');
        $this->db->from('medicines');
        $this->db->order_by('medicine_id');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;
    }


}