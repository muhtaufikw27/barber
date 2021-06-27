<?php
//NUR ADILA PUSPITA SARI//
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
		//$this->load->model("M_hobby");
	}
	
	public function index(){
		$this->load->view('header');
		//$this->load->view('nav');
		$this->load->view('content');
		$this->load->view('footer');
	}
	public function shop(){
		$this->load->view('header_stl');
		$this->load->view('service');
		$this->load->view('footer');
	}
}
