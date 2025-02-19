<?php

class Transaksi extends CI_Controller {


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
		$data['transaksi'] = $this->Mtransaksi->transaksi_member_beli($id_member);

		
		$this->load->model("Notifikasi_model");
		$data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));

		$this->load->view("header", $data);
		$this->load->view('transaksi_tampil', $data);
		$this->load->view('footer');
	}

	function detail($id_transaksi) {

		// panggil model transaksi
		$this->load->model('Mtransaksi');

	
		// panggil fungsi detail()
		$data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

		if ($data["transaksi"]["id_member_beli"] !== $this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda tidak memiliki akses ke halaman ini');
			redirect('transaksi', 'refresh');

		}

		
	
		// panggil fungsi transaksi_detail
		$data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);
	
		$snapToken = "";
		$data["cekmidtrans"] = array();	
		if ($data['transaksi']['status_transaksi'] == "pesan") {
			include 'midtrans-php/Midtrans.php';
	
			// Set Midtrans configuration
			Midtrans\Config::$serverKey = 'SB-Mid-server-xGl_wj0V-9naGcxA9pIDEwoQ';
			Midtrans\Config::$isProduction = false;
			Midtrans\Config::$isSanitized = true;
			Midtrans\Config::$is3ds = true;
	
			$params['transaction_details']['order_id'] = $data['transaksi']['kode_transaksi'];
			$params['transaction_details']['gross_amount'] = $data['transaksi']['total_transaksi'];

			
			try {
				$snapToken = \Midtrans\Snap::getSnapToken($params);
			} catch (Exception $e) {
				// Handle exception
			}
			// cek ke midtrans transaksi sudah masuk/belum/dibayar/belum
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $data['transaksi']['kode_transaksi'] . "/status",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"accept: application/json",
					"authorization: Basic U0ItTWlkLXNlcnZlci14R2xfd2owVi05bmFHY3hBOXBJREV3b1E6YW1pa29t"
				),
			));
	

			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
	

			
			if ($err) {
				echo "cURL Error #:" . $err;
			} else { 
				$responsi = json_decode($response, TRUE);
				if (isset($responsi['status_code']) && in_array($responsi['status_code'], [200, 201])) {
					$status = $responsi['transaction_status'];
					$data['cekmidtrans'] = $responsi;
					if ($responsi['transaction_status'] == "settlement") {
					 $this->Mtransaksi->set_lunas($id_transaksi);
					
					  $id_member_jual = $data["transaksi"]["id_member_jual"];
					  $id_member_beli = $data["transaksi"]["id_member_beli"];
					  $isi_notifikasi = '<span style="color: #007bff;">New payment!</span> <br> Pembayaran untuk transaksi ' . $data['transaksi']['kode_transaksi'] . ' telah berhasil. Ayo kirim barang sekarang!';
					  $status_notifikasi = 'unread';
					  $notifikasi_type = 'already_payment';
					  $notifikasi_data = array(
						  'id_member_jual' => $id_member_jual,
						  'id_member' => $id_member_beli,
						  'id_member_beli' => $id_member_beli,
						  'isi_notifikasi' => $isi_notifikasi,
						  'status' => $status_notifikasi,
						  'notifikasi_type' => $notifikasi_type,
						  'created_at' => date('Y-m-d H:i:s'),
						  'updated_at' => date('Y-m-d H:i:s')
					  );
					  $this->db->insert('notifikasi', $notifikasi_data);
					} else {
						$id_member_jual = $data["transaksi"]["id_member_jual"];
						$id_member_beli = $data["transaksi"]["id_member_beli"];
						$data_member_beli = $this->Mmember->detail($id_member_beli);
						$isi_notifikasi =  '<span style="color: #007bff;"> New sales!</span> <br> ' . $data_member_beli['nama_member'] . ' telah melakukan pembelian. Ayo cek sekarang dan proses segera!';
						$status_notifikasi = 'unread';
						$notifikasi_type = 'new_sales';
						$notifikasi_data = array(
							'id_member_jual' => $id_member_jual,
							'id_member' => $id_member_beli,
							'id_member_beli' => $id_member_beli,
							'isi_notifikasi' => $isi_notifikasi,
							'status' => $status_notifikasi,
							'notifikasi_type' => $notifikasi_type,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
						);
						$this->db->insert('notifikasi', $notifikasi_data);
					}
				}
			}

		}

		if ($this->input->post()) {
			$this->Mtransaksi->kirim_rating($this->input->post());
			$this->session->set_flashdata('pesan_sukses', 'Ulasan telah terkirim');
			redirect('transaksi/detail/' . $id_transaksi, 'refresh');
		}

	

		
		$this->load->model("Notifikasi_model");
		$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view('transaksi_detail', $data);
		$this->load->view('footer');
	}
	

}
