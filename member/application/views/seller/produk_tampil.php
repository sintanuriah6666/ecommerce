<div class="container py-4">
	<h5>Data Produk <?php echo $this->session->userdata('nama_member') ?></h5>
	<a href="<?php echo base_url("seller/produk/tambah") ?>" class="btn btn-soft-pink mb-3">
    <i class="fas fa-plus"></i> Tambah Data
  </a>
	<table class="table table-bordered" id="tabelku">
		<thead>
		<tr>
			<th style="width: 5%; text-align: center;">No</th>
			<th style="width: 40%; text-align: center;">Nama Produk</th>
			<th style="width: 15%; text-align: center;">Harga</th>
			<th style="width: 15%; text-align: center;">Berat</th>
			<th style="width: 15%; text-align: center;">Foto</th>
			<th style="width: 20%; text-align: center;">Opsi</th>
  		</tr>
		</thead>
		<tbody>
			<?php foreach ($produk as $k => $v): ?>
				
			<tr>
				<td><?php echo $k+1; ?></td>
				<td><?php echo $v['nama_produk']; ?></td>
				<td>Rp <?php echo number_format($v['harga_produk']); ?></td>
				<td><?php echo number_format($v['berat_produk']); ?></td>
				<td>
					<img src="<?php echo $this->config->item("url_produk").$v['foto_produk'] ?>" width="200">
				</td>
				<td>
				
					<a href="<?php echo base_url("seller/produk/edit/".$v["id_produk"]) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a href="<?php echo base_url("seller/produk/hapus/".$v["id_produk"]) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
			
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	
</div>

</div>