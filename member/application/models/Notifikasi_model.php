<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {

    public function get_unread_notifikasi_by_member($member_id) {
        $this->db->where('id_member !=', $member_id);
        $query = $this->db->get('notifikasi');
        return $query->result_array();
    }

    public function count_unread_notifikasi_by_member($member_id) {
        $this->db->where('id_member !=', $member_id);
        $this->db->where('status', 'unread');
        $query = $this->db->get('notifikasi');
        return $query->result_array();
    }


    public function insert_notifikasi($data) {
        $this->db->insert('notifikasi', $data);
    }
    
    public function mark_all_as_read($id_member) {
        $this->db->where('id_member !=', $id_member);

        $this->db->update('notifikasi', array('status' => 'read'));
    }

    public function get_all_members_except($id_member_jual) {
        $this->db->select('id_member');
        $this->db->from('member');
        $this->db->where('id_member !=', $id_member_jual);
        $query = $this->db->get();
        return $query->result();
    }
    
}
