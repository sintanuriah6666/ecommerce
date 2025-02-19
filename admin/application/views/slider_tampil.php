<div class="container">
  <h5>Data Slider</h5>
  <a href="<?php echo base_url("slider/tambah") ?>" class="btn btn-soft-pink mb-3">
    <i class="fas fa-plus"></i> Tambah Data
  </a>
  <table class="table table-bordered" id="tabelku">
    <thead>
      <tr>
        <th>No</th>
        <th>Caption</th>
        <th>Foto</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($slider as $k => $v): ?>

        <tr>
          <td><?php echo $k+1 ?></td>
          <td><?php echo $v['caption_slider']; ?></td>
          <td>
            <img src="<?php echo $this->config->item("url_slider").$v["foto_slider"] ?>" width="200">
          </td>
          <td>
            <a href="<?php echo base_url("slider/edit/".$v["id_slider"]) ?>" class="btn btn-warning">Edit</a>
            <a href="<?php echo base_url("slider/hapus/".$v["id_slider"]) ?>" class="btn btn-danger">Hapus</a>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>


</div>