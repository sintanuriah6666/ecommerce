<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index() {
        
        $this->load->model('Mongkir');
        $this->load->model('Mmember');

        $data['distrik'] = $this->Mongkir->tampil_distrik();

        $this->form_validation->set_rules('email_member', 'Email', 'required|is_unique[member.email_member]', array('required' => '%s wajib diisi', 'is_unique' => '%s yang sama sudah digunakan'));
        $this->form_validation->set_rules('password_member', 'Password', 'required');
        $this->form_validation->set_rules('nama_member', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_member', 'Alamat', 'required');
        $this->form_validation->set_rules('wa_member', 'Nomor WhatsApp', 'required');
        $this->form_validation->set_rules('city_id', 'ID Kota', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email_member = $this->input->post("email_member");
            $password_member = sha1($this->input->post("password_member"));
            $nama_member = $this->input->post("nama_member");
            $alamat_member = $this->input->post("alamat_member");
            $wa_member = $this->input->post("wa_member");
            $city_id = $this->input->post("city_id");

            $detail = $this->Mongkir->detail_distrik($city_id);
            $nama_distrik_member = $detail['type']." ".$detail["city_name"]." ".$detail["province"];

            $data = array(
                'email_member' => $email_member,
                'password_member' => $password_member,
                'nama_member' => $nama_member,
                'alamat_member' => $alamat_member,
                'wa_member' => $wa_member,
                'kode_distrik_member' => $city_id,
                'nama_distrik_member' => $nama_distrik_member
            );

            $this->Mmember->register($data);
            $this->session->set_flashdata('pesan_sukses', 'Registrasi berhasil, silahkan login');
            redirect('/', 'refresh');
        }

       
		$this->load->model("Notifikasi_model");
		$data['notifikasi']  = $this->Notifikasi_model->get_unread_notifikasi_by_member($this->session->userdata("id_member"));
			$data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($this->session->userdata("id_member"));
		$this->load->view("header", $data);
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

}