<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ud extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ud');
    }

    public function formEdit($id)
    {
        $data['users'] = $this->M_ud->getUserById($id);
        $data['judul']= 'EDIT';
        $this->load->view('Template/Header_dash', $data);
        $this->load->view('Template/navbar');
        $this->load->view('V_ud', $data);
        $this->load->view('Template/Footer_login');

    }
    public function ubahData()
    {
        $this->M_ud->updateData();
        redirect('tampilkan');
    }
    public function hapus($id)
    {
        $this->M_ud->hapusData($id);
        redirect('tampilkan');
    }
}