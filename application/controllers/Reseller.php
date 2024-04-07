
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reseller_model');
        
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }


    public function index()
	{

		$data['title'] = 'Reseller';
        $data['reseller'] = $this->reseller_model->get_data('d_reseller')->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('reseller', $data);
        $this->load->view('template/footer');
	}

    public function tambah_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'kode' => $this->input->post('kode_barang'),
                'nama' => $this->input->post('produk_reseller'),
            );

            $this->reseller_model->insert_data($data, 'd_reseller');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('reseller');
        }
    }

    public function edit($id){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'kode' => $this->input->post('kode_barang'),
                'nama' => $this->input->post('produk_reseller'),
            );

            $this->reseller_model->update_data($data, 'd_reseller');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil diedit.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('reseller');
        }
    }


    public function delete($id)
    {
        $where = array('id' => $id);

        $this->reseller_model->delete_data($where, 'd_reseller');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('reseller');
    }



    public function _rules()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode Barang','required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('produk_reseller', 'Produk Reseller','required', array('required' => '%s harus diisi'));
    }


}