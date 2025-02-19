<?php
class Produk extends CI_Controller {


	function __construct() {
        parent::__construct();

        // Jika tidak ada tiket bioskop, maka suruh login
		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

	function index() {

		$this->load->model('Mproduk');
		$this->load->model("Notifikasi_model");

		$data['produk'] = $this->Mproduk->tampil();
		$data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));

		$this->load->view("header", $data);
		$this->load->view('produk_tampil', $data);
		$this->load->view('footer');
	}


	function detail($id_produk) {

		
		$this->load->model('Mproduk');
		$data["produk"] = $this->Mproduk->detail_umum($id_produk);
	
		$inputan = $this->input->post();
		if ($inputan) {
			$this->load->model('Mkeranjang');
			$this->Mkeranjang->simpan($inputan, $id_produk);
			$this->session->set_flashdata('pesan_sukses', 'Produk masuk ke keranjang belanja');
			redirect('keranjang', 'refresh');
		}

		
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view('produk_detail', $data);
		$this->load->view('footer');
	}
	

	
}