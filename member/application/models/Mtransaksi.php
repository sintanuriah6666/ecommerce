<?php 
class Mtransaksi extends CI_Model {
	function tampil() {
		$q = $this->db->get('transaksi');
		$d = $q->result_array();

		return $d;
	}

	function transaksi_member_jual($id_member)
	{
		$this->db->where('id_member_jual', $id_member);
		$q = $this->db->get('transaksi');
		$d = $q->result_array();

		return $d;
	}

	function transaksi_member_beli($id_member)
	{
		$this->db->where('id_member_beli', $id_member);
		$q = $this->db->get('transaksi');
		$d = $q->result_array();

		return $d;
	}

	function detail($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		
		// melakukan query
		$q = $this->db->get('transaksi');

		// pecah ke array
		$d = $q->row_array();

		return $d;
	}

	function transaksi_detail($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		
		// melakukan query
		$q = $this->db->get('transaksi_detail');

		// pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function set_lunas($id_transaksi) {
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->set('status_transaksi', 'lunas');
		$this->db->update('transaksi');
	}

	function update_resi($resi, $id_transaksi) {
		$input['resi_ekspedisi'] = $resi;
	
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $input);
	}
	
	function kirim_rating($input) {
		$list_id_transaksi_detail = $input['id_transaksi_detail'];
		$list_jumlah_rating = $input['jumlah_rating'];
		$list_ulasan_rating = $input['ulasan_rating'];
		
		foreach ($list_id_transaksi_detail as $key => $id) {
			$m['waktu_rating'] = date("Y-m-d H:i:s");
			$m['jumlah_rating'] = $list_jumlah_rating[$key];
			$m['ulasan_rating'] = $list_ulasan_rating[$key];
			
			$this->db->where('id_transaksi_detail', $id);
			$this->db->update('transaksi_detail', $m);
		}
	}

	public function get_total_penjualan($start_date, $end_date) {
		// Start building the query
		$this->db->select('MONTH(tanggal_transaksi) as bulan, YEAR(tanggal_transaksi) as tahun, SUM(total_transaksi) as total_penjualan');
		$this->db->from('transaksi');
		
		// Filter by member using id_member_beli or id_member_jual
		$this->db->where('id_member_beli', $this->session->userdata("id_member"));
	
		// Check if start_date and end_date are provided, then apply them to the query
		if ($start_date && $end_date) {
			// Ensure that both dates are in valid datetime format
			$this->db->where('tanggal_transaksi >=', $start_date);
			$this->db->where('tanggal_transaksi <=', $end_date);
		}
	
		// Group by month and year
		$this->db->group_by('MONTH(tanggal_transaksi), YEAR(tanggal_transaksi)');
		
		// Execute the query and return the result
		return $this->db->get()->result();
	}
	
	

    public function get_status_transaksi() {
        $this->db->select('status_transaksi, COUNT(*) AS jumlah_transaksi');
        $this->db->group_by('status_transaksi');
        return $this->db->get('transaksi')->result_array();
    }

    public function get_pendapatan_per_transaksi() {
        $this->db->select('id_transaksi, kode_transaksi, total_transaksi');
        return $this->db->get('transaksi')->result_array();
    }


}