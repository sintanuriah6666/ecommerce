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

		//panggil model Mproduk dan fungsi tampil()

		$this->load->model('Mproduk');
        $id_member = $this->session->userdata("id_member");
		$data['produk'] = $this->Mproduk->produk_by_id_new($id_member);

		x
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view('seller/produk_tampil', $data);
		$this->load->view('footer');
	}

    function tambah() {
        $this->load->model('Mkategori');
        $this->load->model('Mproduk');
        $this->load->model('Mmember');
        $this->load->model('Notifikasi_model'); 
        $data['kategori'] = $this->Mkategori->tampil();
    
        $inputan = $this->input->post();
        if ($inputan) {
          
            $this->Mproduk->simpan($inputan);
            
           
            $id_member_jual = $this->session->userdata("id_member");
            $id_member = $id_member_jual;
            $nama_produk = $inputan['nama_produk'];
            $nama_member_jual = $this->Mmember->detail($id_member_jual)['nama_member'];

            $all_members = $this->Notifikasi_model->get_all_members_except($id_member_jual);
            foreach ($all_members as $member) {
                $this->Notifikasi_model->insert_notifikasi([
                    'id_member_jual' => $id_member_jual,
                    'id_member_beli' => $member->id_member,
                    'id_member' => $id_member,
                    'notifikasi_type' => 'new_product',
                    'isi_notifikasi' => '<span style="color: #007bff;"> New Product!</span> <br> ' . 
                    $nama_member_jual . ' telah menambahkan <strong>' . $nama_produk . '</strong> ke toko mereka!',
                    'status' => 'unread'
                ]);
            }
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan dan Notifikasi Dikirim');
            redirect('seller/produk', 'refresh');
        }
        
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
        $this->load->view('seller/produk_tambah', $data);
        $this->load->view('footer');
    }
    
    function edit($id_produk) {

      
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail($id_produk);
       
        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mproduk->ubah($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'Produk Tersimpan');
            redirect('seller/produk', 'refresh');
        }

        
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
        $this->load->view('seller/produk_edit', $data);
        $this->load->view('footer');
    }

    function hapus($id_produk) {
        $this->load->model('Mproduk');
        $this->Mproduk->hapus($id_produk);

        $this->session->set_flashdata('pesan_sukses', "Produk Telah Dihapus");
        redirect('seller/produk','refresh');
    }

    
}
