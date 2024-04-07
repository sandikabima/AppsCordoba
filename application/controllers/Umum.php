<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('umum_model');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function index()
	{

		$data['title'] = 'Umum';
        $data['umum'] = $this->umum_model->get_data('d_produk')->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('umum');
        $this->load->view('template/footer');
	}
}