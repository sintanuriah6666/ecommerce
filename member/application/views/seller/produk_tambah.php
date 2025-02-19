<div class="container py-5">
	<h5>Tambah Produk</h5>
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label>Kategori</label>
			<select class="form-control form-select" name="id_kategori">
				<option value="">Pilih</option>
					<?php foreach ($kategori as $key => $value): ?>
						<option value="<?php echo $value['id_kategori'] ?>">
							<?php echo $value['nama_kategori'] ?>
						</option>
					<?php endforeach ?>
			</select>
		</div>
		<div class="mb-3">
			<label>Nama</label>
			<input type="text" name="nama_produk" class="form-control">
		</div>
		<div class="mb-3">
			<label>Harga</label>
			<input type="text" name="harga_produk" class="form-control">
		</div>
		<div class="mb-3">
			<label>Berat</label>
			<input type="text" name="berat_produk" class="form-control">
			<text class="text-muted small">Gram</text>
		</div>
		<div class="mb-3">
			<label>Foto</label>
			<input type="file" name="foto_produk" class="form-control">
		</div>
		<div class="mb-3">
			<label>Deskripsi</label>
			<textarea type="text" name="deskripsi_produk" class="form-control"></textarea>
		</div>
		<button class="btn btn-primary">Simpan</button>
	</form>
</div>