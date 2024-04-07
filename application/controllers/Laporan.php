<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function index()
	{

		$data['title'] = 'Laporan';

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('laporan/laporan_belanja');
        $this->load->view('template/footer');
	}

    public function cetak_laporan_tanggal(){

        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

            $data['result'] = [
                'start_date' => $start_date,
                'end_date' => $end_date
            ];

            $this->load->view('laporan/cetak_laporan_tanggal', $data);
        }

}