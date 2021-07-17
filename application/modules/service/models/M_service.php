<?php

class M_service extends CI_Model
{
    public function __construct()
    {
        
        parent::__construct();
        
    }
    public function getAllArtikel()
    {
        return $this->db->get('service')->result_array();
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
    public function hapusData($id)
    {
        return $this->db->delete('service', ['id_service' => $id]);
    }
}