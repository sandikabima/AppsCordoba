
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_umum extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_umum_model');
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }

    public function index()
	{

		$data['title'] = 'Detail Umum';
        $data['detail_umum'] = $this->detail_umum_model->get_data();
        

		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('detail_umum');
        $this->load->view('template/footer');
	}

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->detail_umum_model->delete_data($where, 'kate_produk');
        $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data!</strong> berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('detail_umum');
    }
}