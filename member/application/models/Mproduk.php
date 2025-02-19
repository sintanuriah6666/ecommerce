<?php 
class Mproduk extends CI_Model {
	function tampil() {
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}

	function produk_by_id($id_produk) {
		$this->db->where('id_produk', $id_produk);
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}


	public function get_terlaris() {
        // Mengambil data produk terlaris dengan total jumlah terjual
        $this->db->select('produk.nama_produk, SUM(transaksi_detail.jumlah_beli) AS jumlah_terjual');
        $this->db->from('produk');
        $this->db->join('transaksi_detail', 'transaksi_detail.id_produk = produk.id_produk');
        $this->db->group_by('produk.nama_produk');
        $this->db->order_by('jumlah_terjual', 'DESC');
        $this->db->limit(5); // Menampilkan 5 produk terlaris
        return $this->db->get()->result_array();
    }
	
	function produk_by_id_new($id_member) {
		$this->db->where('id_member', $id_member);
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}


	function tampil_produk_terbaru() {
		$this->db->order_by('id_produk', 'desc');
		$q = $this->db->get('produk',4,0);
		$d = $q->result_array();

		return $d;
	}

	function produk_member($id_member) {
		$this->db->where('id_member', $id_member);
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}

	function simpan($inputan) {
		//urusan foto
		$config['upload_path'] = $this->config->item("assets_produk");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		$ngupload = $this->upload->do_upload("foto_produk");

		if ($ngupload) {
			$inputan['foto_produk'] = $this->upload->data("file_name");
		}

		$inputan['id_member'] = $this->session->userdata("id_member");
		
		//query insert data
		$this->db->insert('produk', $inputan);
	}

	function detail ($id_produk) {
		//detail produk sesuai id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id_produk);
		$this->db->join('kategori','produk.id_kategori = kategori.id_kategori', 'left');
		$q = $this->db->get('produk');
		$d = $q->row_array();

		return $d;
	}

	function ubah($inputan, $id) {
		//urusan foto
		$config['upload_path'] = $this->config->item("assets_produk");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		$ngupload = $this->upload->do_upload("foto_produk");

		if ($ngupload) {
			$inputan['foto_produk'] = $this->upload->data("file_name");
		}

		$inputan['id_member'] = $this->session->userdata("id_member");
		
		//query update data
		//ubah produk sesuai id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $inputan);
	}

	function hapus($id_produk) {
		//hapus produk sesuai id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('produk');
	}

	function detail_umum($id_produk) {
		$this->db->where('id_produk', $id_produk);
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get('produk');
		$data = $query->row_array();
		return $data;
	}
}