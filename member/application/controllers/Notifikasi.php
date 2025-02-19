<?php

class Notifikasi extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('Notifikasi_model');
}

public function read_all() {
    $id_member = $this->session->userdata("id_member");
  
    if($id_member) {
        $this->Notifikasi_model->mark_all_as_read($id_member);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
}
