<?php
class Mslider extends CI_Model {
	function tampil() {

		// melakukan query
		$q = $this->db->get("slider");

		// pecah ke array
		$d = $q->result_array();

		return $d;
	}
	function simpan($inputan) {
		// upload foto_slider 
		$config['upload_path'] = $this->config->item("assets_slider");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		//saat upload foto_slider
		$ngupload = $this->upload->do_upload("foto_slider");

		//jika ngupload maka dapatkan nama fotonya untuk ditampung ke db
		if ($ngupload) {
			$inputan['foto_slider'] = $this->upload->data("file_name");
		}

		// query simpan data ke tabel slider
		// insert into slider
		$this->db->insert('slider', $inputan);
	}

	function hapus($id_slider) {
		// delete from slider where id_slider=...
		$this->db->where('id_slider', $id_slider);
		$this->db->delete('slider');
	}

	function detail($id_slider) {
		///select * from slider where id_slider
		$this->db->where('id_slider', $id_slider);
		
		// melakukan query
		$q = $this->db->get('slider');

		// pecah ke array
		$d = $q->row_array();

		return $d;
	}

	function edit($inputan, $id_slider) {
		$config['upload_path'] = $this->config->item("assets_slider");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		// saat upload foto_slider
		$ngupload = $this->upload->do_upload("foto_slider");

		// jika ngupload maka dapatkan nama fotonya untuk ditampung ke db
		if ($ngupload) {
			$inputan['foto_slider'] = $this->upload->data("file_name");
		}

		// query simpan data ke tabel slider
		// insert into slider
		$this->db->where('id_slider', $id_slider);
		$this->db->update('slider', $inputan);
	}
}
