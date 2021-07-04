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
    public function tambahdata(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['matches' => 'password dont match!', 'min_length' => 'password is short']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false){
            $data['judul'] = 'Tambah';
            $this->load->view('Template/Header_dash',$data);
            $this->load->view('Template/navbar');
            $this->load->view('V_tambah');
            $this->load->view('Template/Footer_login',$data);
        }
        else{
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('as', true),
                'is_active' => 1,
                'date' => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> akun anda telah dibuat.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('tampilkan');
        }

    }
}