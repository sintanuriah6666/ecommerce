<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    // Konstruktor
    function __construct() {
        parent::__construct();
        // Memastikan pengguna telah login
        if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

    public function index() {
        $this->load->model('Mkeranjang'); // Memuat model Mkeranjang
        $data['keranjang'] = $this->Mkeranjang->tampil(); // Mengambil data keranjang dari database
    
        $this->load->model("Notifikasi_model"); // Memuat model Notifikasi_model
        $data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
        $data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
    
        $this->load->view("header", $data);  // Menampilkan header
        $this->load->view('keranjang', $data); // Menampilkan halaman keranjang
        $this->load->view('footer'); // Menampilkan footer
    }
    

    function checkout($id_member_jual) {
        $this->load->model('Mkeranjang');
       
        
        $totalBerat = 0;
        $data['keranjang'] = $this->Mkeranjang->tampil_member_jual($id_member_jual);
        foreach ($data['keranjang'] as $keranjang) {
            $totalBerat += $keranjang['berat_produk'] * $keranjang['jumlah'];
        }
    
        $this->load->model('Mmember');
        $data['member_jual'] = $this->Mmember->detail($id_member_jual);
        
        $id_member_beli = $this->session->userdata('id_member');
        $data['member_beli'] = $this->Mmember->detail($id_member_beli);
        
        $this->load->model('Mongkir');
        $origin = $data['member_jual']['kode_distrik_member'];
        $destination = $data['member_beli']['kode_distrik_member'];
        $data['biaya'] = $this->Mongkir->biaya($origin, $destination, $totalBerat);
        
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $ongkir = $this->input->post('ongkir');
            $ongkirterpilih = $data['biaya']['costs'][$ongkir];
    
            $id_transaksi = $this->Mkeranjang->checkout(
                $data['keranjang'], 
                $data['member_jual'], 
                $data['member_beli'], 
                $data['biaya']['name'], 
                $ongkirterpilih
            );

            $this->session->set_flashdata('pesan_sukses', 'Transaksi telah terbuat');
			redirect('transaksi/detail/' . $id_transaksi, 'refresh');
    
        }
        $this->load->model("Notifikasi_model");


		$data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));

		$this->load->view("header", $data);
            $this->load->view('checkout', $data);
            $this->load->view('footer');
        }  
        

        public function hapus($id_keranjang) {
            $this->load->model('Mkeranjang');
            $this->Mkeranjang->hapus($id_keranjang);
            $this->session->set_flashdata('pesan_sukses', 'Produk telah dihapus dari keranjang');
            redirect('keranjang', 'refresh');
        }
        

}
