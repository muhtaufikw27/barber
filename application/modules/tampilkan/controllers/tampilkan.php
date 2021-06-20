<?php
//Andi Ahmad Miftahul Fauzan
defined('BASEPATH') or exit('No direct script access allowed');

class tampilkan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tampilkan');
    }

    public function index()
    {
        $data['users'] = $this->M_tampilkan->getAllUser();
        $this->load->view('Template/Header_dash', $data);
        $this->load->view('Template/navbar');
        $this->load->view('V_tampilkan', $data);
        $this->load->view('Template/Footer_login', );
    }
}