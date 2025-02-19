<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {
    function login($inputan) {
        $username = $inputan['username'];
        $password = $inputan['password'];
        $password = sha1($password);

        // Cek ke database
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();
       
       // Jika tidak kosong, maka ada
        if (!empty($cekadmin)) {
            // Membuat tiket bioskop yang dipakai selama keliling aplikasi
            $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
            $this->session->set_userdata("username", $cekadmin["username"]);
            $this->session->set_userdata("nama", $cekadmin["nama_admin"]);
            return "ada";
        } else {
            return "gak ada";
        }

    }


    function ubah($inputan, $id_admin) {
        // Jika tidak kosong password, maka enkripsi
        if (!empty($inputan["password"])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }
    
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);
    
        // Dapatkan data admin yang baru dari database setelah diupdate
        $this->db->where('id_admin', $id_admin);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();
    
        // Update session data dengan data admin yang baru
        $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
        $this->session->set_userdata("username", $cekadmin["username"]);
        $this->session->set_userdata("nama", $cekadmin["nama_admin"]);
    }
    
}
