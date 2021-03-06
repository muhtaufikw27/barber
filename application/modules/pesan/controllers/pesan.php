<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pesan extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesan');
    }
    
    public function tampil($id_users)
        {
            $data['users']    = $this->M_pesan->ambil_id_users($id_users);
            $data['pesan']    = $this->M_pesan->ambil_id_pesan($id_invoice);
            $this->load->view('home/header', $data);
            $this->load->view('pesan', $data);
            $this->load->view('home/footer');
        }
}