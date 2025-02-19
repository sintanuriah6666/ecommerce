<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


	function __construct() {
        parent::__construct();

        // Jika tidak ada tiket bioskop, maka suruh login
		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }


	public function index()
	{
		//panggil model Mmember
		$this->load->model("Mmember");

		$data["member"] = $this->Mmember->tampil();

	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("member_tampil", $data);
		$this->load->view("footer");
	}

	function detail($id_member){

		$this->load->model("Mmember");
		$data["member"] = $this->Mmember->detail($id_member);

		$this->load->model("Mtransaksi");
		$data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);
		$data['beli'] = $this->Mtransaksi->transaksi_member_beli($id_member);

	
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("member_detail", $data);
		$this->load->view("footer");
	}

}