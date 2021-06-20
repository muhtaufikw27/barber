<?php
class M_login extends CI_Model
{
    function cek_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $users = $this->db->get_where('users', ['email' => $email])->row_array();
        if($users){
            if($users){
                if(password_verify($password, $users['password'])){

                }else{
                    $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Password salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Akun belum aktif.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
              redirect('auth');
            }

        }else{
            $this->session->set_flashdata('massage', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Email belum terdaftar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('auth');
        }
    }
}