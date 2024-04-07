<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index() {

        $data['title'] = 'Apps Login';
	    $this->load->view('login/login', $data);

    }

    public function aksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){

            if($user['is_active'] == 1){

                if(password_verify($password , $user['password'])){

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    redirect('dashboard');

                } else {
                    $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password!</strong> salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                    redirect('auth');
                }
                
            } else {
            $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Email!</strong> belum aktif.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');
            }

        }else {
            $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> tidak ada.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');
        }
    }


    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Logout.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');

    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email ','required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password','required|trim');
    }

}