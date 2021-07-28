<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualandetail extends CI_Controller
{
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('penjualanmodel');
       $this->load->model('pelangganmodel');
       $this->load->model('barangmodel');
   }
   
	public function proses()
	{
        $data['allpenjualan'] = $this->penjualanmodel->get_all_data_penjualan();
        $data['allbarang'] = $this->barangmodel->get_all_data_barang();
        $data['allpelanggan'] = $this->pelangganmodel->get_all_data_pelanggan();        
        
        $data['title'] = "Detail Penjualan";

        $this->load->view('template/header', $data);
        $this->load->view('penjualandetail/create', $data);
        $this->load->view('template/footer');
	}

    public function simpanpenjualandetail()
    {
        $barang = $this->db->get_where('barang', ['barang_id' => $this->input->post('barang_id')])->row_array();
        
        if( $this->input->post('diskon') !=0) {
            $harga = $barang['harga_barang'] * $this->input->post('jumlah') * $this->input->post('diskon') / 100;
            $hargatotal = $barang['harga_barang'] * $this->input->post('jumlah') - $harga;
        } else {
            $hargatotal = $barang['harga_barang'] * $this->input->post('jumlah');
        }

        //proses update grand total
        $barang = $this->db->get_where('penjualan_detail', ['penjualan_id' => $this->input->post('penjualan_id')])->row_array();

        $grandtotal = $barang['harga_total'] + $hargatotal;
        $this->db->set('total', $grandtotal);
        $this->db->where('penjualan_id', $this->input->post('penjualan_id'));
        $this->db->update('penjualan');


        $data = [
           'penjualan_id' => $this->input->post('penjualan_id'),
           'barang_id' => $this->input->post('barang_id'),
           'jumlah' => $this->input->post('jumlah'),
           'diskon' => $this->input->post('diskon'),
           'harga_total' => $hargatotal,
        ];

       $this->db->insert('penjualan_detail/proses', $data);

       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Selamat!</strong> List penjualan sudah ditambahkan.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

       redirect('penjualan/detail/' . $this->input->post('penjualan_id'));
    }

    public function hapus($penjualan_id, $penjualan_detail_id)
    {   
        $pnjd = $this->db->get_where('penjualan_detail', ['penjualan_detail_id' => $penjualan_detail_id])->row_array();
        $pnj = $this->db->get_where('penjualan', ['penjualan_id' => $penjualan_id])->row_array();

        $grandtotal = $pnj['total'] - $pnjd['harga_total'];
        $this->db->set('total', $grandtotal);
        $this->db->where('penjualan_id', $penjualan_id);
        $this->db->update('penjualan');
        
       $this->db->where('penjualan_detail_id', $penjualan_detail_id);
       
       $this->db->delete('penjualan_detail');

       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Selamat!</strong> List penjualan sudah dihapus.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>');

       redirect('penjualan');
    }
}
