<?php 
class Mslider extends CI_Model {
	function tampil() {

		// melakukan query
		$q = $this->db->get("slider");

		// pecah ke array
		$d = $q->result_array();

		return $d;
	}

}
