<?php
//NUR ADILA PUSPITA SARI//
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
		//$this->load->model("M_hobby");
	}
	
	function index(){
		$this->load->view('header');
		//$this->load->view('nav');
		$this->load->view('content');
		$this->load->view('footer');
	}
}
