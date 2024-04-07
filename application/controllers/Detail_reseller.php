
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_reseller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_reseller_model');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }


    public function index()
	{

		$data['title'] = 'Detail Reseller';
        $data['detail_reseller'] = $this->detail_reseller_model->get_data();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('detail_reseller', $data);
        $this->load->view('template/footer');
	}

    public function tambah_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'kode' => $this->input->post('kode_barang'),
                'nama' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga_jual'),
            );

            $this->detail_reseller_model->insert_data($data, 'kate_reseller');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('detail_reseller');
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
                'nama' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga_jual'),
            );

            $this->detail_reseller_model->update_data($data, 'kate_reseller');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil diedit.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('detail_reseller');
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->detail_reseller_model->delete_data($where, 'kate_reseller');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('detail_reseller');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_barang', 'Kode ','required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('nama_produk', 'Nama','required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('harga_jual', 'Harga','required', array('required' => '%s harus diisi'));
    }


}