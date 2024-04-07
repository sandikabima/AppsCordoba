<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('faktur_model');
        $this->load->model('laporan_model');
        $this->load->library('pdf');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function faktur($id)
    {

        $data['penjualan'] =  $this->db->get_where('penjualan', ['faktur' => $id])->row_array();
        $data['detail_penjualan'] = $this->laporan_model->get_data($id);
        $this->load->view('laporan/cetakFaktur',$data);
    }


    public function index()
	{

		$data['title'] = 'Faktur';
        $data['faktur'] = $this->faktur_model->get_data('penjualan')->result();
        

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('faktur',$data);
        $this->load->view('template/footer');
	}

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->faktur_model->delete_data($where, 'penjualan');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('faktur');
    }

}