
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function index()
	{

		$data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori_model->get_data('kategori')->result();

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('kategori', $data);
        $this->load->view('template/footer');
	}

    public function tambah_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'nama' => $this->input->post('nama_kategori'),
            );

            $this->kategori_model->insert_data($data, 'kategori');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('kategori');
        }
    }

    public function edit($id){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'id' => $id,
                'nama' => $this->input->post('nama_kategori'),
               
            );

            $this->kategori_model->update_data($data, 'kategori');

            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil diedit.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('kategori');
        }
    }


    public function delete($id)
    {
        $where = array('id' => $id);

        $this->kategori_model->delete_data($where, 'kategori');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('kategori');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required', array('required' => '%s harus diisi'));
    }

}