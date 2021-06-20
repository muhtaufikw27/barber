<?php

class M_tampilkan extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }
}