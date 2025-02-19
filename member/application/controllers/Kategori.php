<?php
class Kategori extends CI_Controller {


	function __construct() {
        parent::__construct();

		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

	function index() {

		//panggil model Mkategori
		$this->load->model("Mkategori");

		$data["kategori"] = $this->Mkategori->tampil();

		
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("kategori_tampil", $data);
		$this->load->view("footer");
	}

	function tambah() {

		//mendapatkan inputan dari formulir pakai $this->input->post()
		$inputan = $this->input->post();

		//form validation nama_kategori wajib diisi
        $this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required");

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message("required", "%s Wajib Diisi");

		//jika ada inputan
		if ($this->form_validation->run()==TRUE) {
			// panggil model Mkategori
			$this->load->model("Mkategori");

			// jalankan fungsi simpan()
			$this->Mkategori->simpan($inputan);

			// pesan dilayar
			$this->session->set_flashdata('pesan_sukses', 'Data Kategori Tersimpan');

			// redirect ke fitur kategori untuk tampil kategori
			redirect('kategori', 'refresh');
		}
		
	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("kategori_tambah");
		$this->load->view("footer");
	}

	function hapus($id_kategori) {
		// panggil model Mkategori
		$this->load->model("Mkategori");

		// jalankan fungsi hapus()
		$this->Mkategori->hapus($id_kategori);

		// pesan dilayar
		$this->session->set_flashdata('pesan_sukses', 'Data Telah terhapus');

		// redirect ke fitur kategori untuk tampil kategori
		redirect('kategori', 'refresh');
	}

	function edit($id_kategori) {

		// tampilkan dulu kategori yg lama
		$this->load->model("Mkategori");
		$data["kategori"] = $this->Mkategori->detail($id_kategori);

		//form validation nama_kategori wajib diisi
        $this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required");

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message("required", "%s Wajib Diisi");

		// baru ubah data
		$inputan = $this->input->post();
		// jika ada inputan
		if ($this->form_validation->run()==TRUE) {
			// jalankan fungsi edit()
			$this->Mkategori->edit($inputan, $id_kategori);
			// pesan
			$this->session->set_flashdata('pesan_sukses', 'Kategori Telah Diubah');

			// redirect ke fitur kategori untuk tampil kategori
			redirect('kategori', 'refresh');
		}
	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("kategori_edit", $data);
		$this->load->view("footer");
	}


	function detail($id) {
		$this->load->model('Mkategori');
		$data["kategori"] = $this->Mkategori->detail($id);
		$data['produk'] = $this->Mkategori->produk($id);
		
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("kategori_produk", $data);
		$this->load->view("footer");
	}
	
}
