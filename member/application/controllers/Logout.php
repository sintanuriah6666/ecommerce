<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index() {
        // Menghancurkan tiket bioskop yang dibuat saat login tadi
        $this->session->unset_userdata("id_member");
        $this->session->unset_userdata("email_member");
        $this->session->unset_userdata("nama_member");
        $this->session->unset_userdata("alamat_member");
        $this->session->unset_userdata("wa_member");

        // Redirect ke halaman login
        $this->session->set_flashdata('pesan_sukses', 'Anda Telah Logout');
        redirect('/', 'refresh');
    }
}
