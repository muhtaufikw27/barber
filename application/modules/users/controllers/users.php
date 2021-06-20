<?php
class users extends MY_Controller {

public function index(){
    $data['users'] = $this->db->get_where('users', ['email'=> $this->session->userdata('emai')])->row_array();
    redirect('dashboard');
}
}