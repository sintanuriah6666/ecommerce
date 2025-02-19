<?php 
class Mproduk extends CI_Model {
	function tampil() {
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}

	function detail_umum($id_produk) {
		$this->db->where('id_produk', $id_produk);
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get('produk');
		$data = $query->row_array();
		return $data;
	}
}