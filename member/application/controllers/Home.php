<?php
class Home extends CI_Controller {



	function __construct() {
        parent::__construct();

        // Jika tidak ada tiket bioskop, maka suruh login
		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

	function index() {

		$this->load->model("Mmember");
		$this->load->model("Notifikasi_model");
		$data["jumlah_member_distrik"] = $this->Mmember->jumlah_member_distrik();

		// $data["home"] = $this->Mhome->tampil();

		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
		$this->load->view("home", $data);
		$this->load->view("footer");
	}
}
