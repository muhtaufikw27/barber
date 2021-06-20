<?php
class Dashboard extends MY_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->view('Template/Header_dash');
        $this->load->view('Template/navbar');
        $this->load->view('V_Dashboard');
        $this->load->view('Template/Footer_login');
    }
}