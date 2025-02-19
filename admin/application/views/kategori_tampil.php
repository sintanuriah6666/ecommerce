<div class="container">
  <h5>Data Brands</h5>
  <a href="<?php echo base_url("kategori/tambah") ?>" class="btn btn-soft-pink mb-3">
    <i class="fas fa-plus"></i> Tambah Data
  </a>
  <table class="table table-bordered" id="tabelku">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($kategori as $k => $v): ?>

        <tr>
          <td><?php echo $k+1 ?></td>
          <td><?php echo $v['nama_kategori']; ?></td>
          <td>
            <img src="<?php echo $this->config->item("url_kategori").$v["foto_kategori"] ?>" width="200">
          </td>
          <td>
            <a href="<?php echo base_url("kategori/edit/".$v["id_kategori"]) ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="<?php echo base_url("kategori/hapus/".$v["id_kategori"]) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>

 
</div>