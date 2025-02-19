<?php
class Penjualan extends CI_Controller {


	function __construct() {
        parent::__construct();

        // Jika tidak ada tiket bioskop, maka suruh login
		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

	function index() {

		//panggil model Mtransaksi dan fungsi tampil()

		$id_member = $this->session->userdata("id_member");

		$this->load->model('Mtransaksi');
		$data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);

	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view('seller/penjualan_tampil', $data);
		$this->load->view('footer');
	}

	function detail($id_transaksi) {

		// panggil model transaksi
		$this->load->model('Mtransaksi');

		// panggil fungsi detail()
		$data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

		if ($data["transaksi"]["id_member_jual"] !== $this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda tidak memiliki akses ke halaman ini');
			redirect('seller/penjualan', 'refresh');

		}

		// panggil fungsi penjualan_detail
		$data['penjualan_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);

		$this->form_validation->set_rules("resi_ekspedisi", "resi", "required");
		$this->form_validation->set_message("required", "%s wajib diisi");
		if ($this->form_validation->run() == TRUE) {
			$resi = $this->input->post("resi_ekspedisi");
			$this->Mtransaksi->update_resi($resi, $id_transaksi);

			$this->Mtransaksi->set_lunas($id_transaksi);
			$this->load->model('Mmember');
			$id_member_jual = $data["transaksi"]["id_member_jual"];
			$id_member_beli = $data["transaksi"]["id_member_beli"];
			$data_member_jual = $this->Mmember->detail($id_member_jual);
			$isi_notifikasi = '<span style="color: #007bff;">Your Order OTW!</span> <br> Orderan anda dari toko <b>' . $data_member_jual["nama_member"] . '</b> sedang dalam perjalanan. Nomor resi: ' . $resi;
			$status_notifikasi = 'unread';
			$notifikasi_type = 'order_shipped';
			$notifikasi_data = array(
				'id_member_jual' => $id_member_jual,
				'id_member' => $id_member_jual,
				'id_member_beli' => $id_member_beli,
				'isi_notifikasi' => $isi_notifikasi,
				'status' => $status_notifikasi,
				'notifikasi_type' => $notifikasi_type,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->db->insert('notifikasi', $notifikasi_data);


			$this->session->set_flashdata('pesan_sukses', 'nomor resi telah terkirim');

			redirect('seller/penjualan/detail/' . $id_transaksi, 'refresh');
		}


	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view('seller/penjualan_detail', $data);
		$this->load->view('footer');
	}
}