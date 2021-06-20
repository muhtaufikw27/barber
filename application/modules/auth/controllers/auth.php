<?php
class auth extends MY_Controller {
	public function __construct(){ 
		parent::__construct();
        //$this->load->model('M_login');
        //$this->load->model('M_Register');
        $this->load->library('form_validation');
	}
	
	public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false){
        $data['judul'] = 'Login Page';
        $this->load->view('Template/Header_login',$data);
		$this->load->view('V_login');
        $this->load->view('Template/Footer_login',$data);
        }else{
            $this->cek_login();
        }
	}
    private function cek_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $users = $this->db->get_where('users', ['email' => $email])->row_array();
        if($users){
            if($users){
                if(password_verify($password, $users['password'])){
                    if($users['role_id']==1){
                        $data = [
                            'email' => $users['email']
                        ];
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }else{
                        redirect('home');
                    }
                    
                  

                }else{
                    $this->session->set_flashdata('massage', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Password salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('massage', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Akun belum aktif.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
              redirect('auth');
            }

        }else{
            $this->session->set_flashdata('massage', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Email belum terdaftar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('auth');
        }
    }
    
    public function registration(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['matches' => 'password dont match!', 'min_length' => 'password is short']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false){
            $data['judul'] = 'Registrasi';
            $this->load->view('Template/Header_login',$data);
            $this->load->view('V_register');
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
            redirect('auth');
        }


    }
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('auth');
    }
}