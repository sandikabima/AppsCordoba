<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_reseller extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('pos_reseller_model');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function index()
	{

		$data['title'] = 'Pos Reseller';
        $data['pos_reseller'] = $this->pos_reseller_model->get_data();
        $data['keranjang'] = $this->pos_reseller_model->get_keranjang('sementara')->result();
        $data['total'] = $this->pos_reseller_model->total();
        $data['faktur'] = $this->pos_reseller_model->faktur('faktur')->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pos_reseller',$data);
        $this->load->view('template/footer');
	}

    public function tambah_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'detail' => $this->input->post('detail'),
                'qty' => $this->input->post('qty'),
                'harga' => $this->input->post('harga') * $this->input->post('qty'),
                'faktur' => $this->input->post('faktur'),
            );

            $this->pos_reseller_model->insert_data($data, 'sementara');
            $this->pos_reseller_model->insert_data_detail_penjualan($data, 'detail_penjualan');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('pos_reseller');
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->pos_reseller_model->delete_data($where, 'sementara');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('pos_reseller');
    }


    public function belanja(){

        $this->_rules();

        if($this->form_validation->run() != FALSE){
            $this->index();
        } else {
            
            $data = array(
                'faktur' => $this->input->post('faktur'),
                'tanggal' => $this->input->post('tanggal'),
                'total' => $this->input->post('total'),
                'costumer' => $this->input->post('nama'),
            );

            $f_detail = array(
                'id' => 1,
                'faktur' => $this->input->post('faktur') + 1,
            );


            $this->pos_reseller_model->belanja($data, 'penjualan');
            $this->pos_reseller_model->hapus_data_sementara();

            $this->pos_reseller_model->faktur_edit($f_detail, 'faktur');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('pos_reseller');
        }
    }



    public function _rules()
    {
        $this->form_validation->set_rules('qty', 'Qty','required', array('required' => '%s harus diisi'));
    }

}