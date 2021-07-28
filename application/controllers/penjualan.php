<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller
{
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('penjualanmodel');
       $this->load->model('pelangganmodel');
   }
   
	public function index()
	{
        $data['allpenjualan'] = $this->penjualanmodel->get_all_data_penjualan();
        $data['allpelanggan'] = $this->pelangganmodel->get_all_data_pelanggan();
        $data['title'] = "Daftar Penjualan";

        $this->load->view('template/header', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('template/footer');
	}

    public function create()
	{
        
        $data['title'] = "Tambah Penjualan";

        $this->load->view('template/header', $data);
        $this->load->view('penjualan/create', $data);
        $this->load->view('template/footer');
	}

    public function simpanpenjualan()
    {
        $penjualan_id = time();
        $data = [
           'penjualan_id' => $penjualan_id,
           'pelanggan_id' => $this->input->post('pelanggan_id'),
           'tgl_penjualan' => $this->input->post('tgl_penjualan'),
           'keterangan' => $this->input->post('keterangan'),
        ];
       $this->db->insert('penjualan', $data);

       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Selamat!</strong> List penjualan sudah ditambahkan.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

       redirect('penjualandetail/proses/' . $penjualan_id);
    }

    public function detail($penjualan_id)
	{
        
        $data['title'] = "Detail penjualan";
        
        $data['penjualan'] = $this->db->get_where('penjualan', ['penjualan_id' => $penjualan_id])->row_array();
        $data['penjualandetail'] = $this->penjualanmodel->get_detail_penjualan($penjualan_id);

        $this->load->view('template/header', $data);
        $this->load->view('penjualan/detail', $data);
        $this->load->view('template/footer');
	}

    public function editpenjualan()
    {
       $this->db->set('nama_penjualan', $this->input->post('nama_penjualan'));
       $this->db->set('harga_penjualan', $this->input->post('harga_penjualan'));
       $this->db->set('stok', $this->input->post('stok'));
       $this->db->set('keterangan', $this->input->post('keterangan'));
       
       $this->db->where('penjualan_id', $this->input->post('penjualan_id'));

       $this->db->update('penjualan');

       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Selamat!</strong> List penjualan sudah diedit.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');

       redirect('penjualan');
    }

    public function hapus($penjualan_id)
    {       
       $this->db->where('penjualan_id', $penjualan_id);

       $this->db->delete('penjualan');

       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Selamat!</strong> List penjualan sudah dihapus.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');

       redirect('penjualan');
    }
}
