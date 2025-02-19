<div class="container">
  <h5>Data Artikel</h5>
  
 
  <a href="<?php echo base_url("artikel/tambah") ?>" class="btn btn-soft-pink mb-3">
    <i class="fas fa-plus"></i> Tambah Data
  </a>

  <table class="table table-bordered" id="tabelku">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Foto</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($artikel as $k => $v): ?>
        <tr>
          <td><?php echo $k+1 ?></td>
          <td><?php echo $v['judul_artikel']; ?></td>
          <td>
            <img src="<?php echo $this->config->item("url_artikel").$v["foto_artikel"] ?>" width="200">
          </td>
          <td>
            <!-- Tombol Edit dan Hapus -->
            <a href="<?php echo base_url("artikel/edit/".$v["id_artikel"]) ?>" class="btn btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <a href="<?php echo base_url("artikel/hapus/".$v["id_artikel"]) ?>" class="btn btn-danger">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
