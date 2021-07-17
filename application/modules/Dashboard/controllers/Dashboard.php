<?php
class Dashboard extends MY_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar',$data);
        $this->load->view('V_Dashboard');
        $this->load->view('Template/Footer_login');
    }
    function barbershop(){
        $data['users'] = $this->db->get_where('users', ['email' 
		=> $this->session->userdata('email')])->row_array();
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar1',$data);
        $this->load->view('V_Dashboard');
        $this->load->view('Template/Footer_login');
    }
}