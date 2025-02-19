

<div class="container">
  <h5>Data Produk</h5>
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
          <td>Rp <?php echo number_format($v['harga_produk']) ?></p></td>
          <td>Kg <?php echo number_format($v['berat_produk'], 2) ?></p></td>
          <td>
            <img src="<?php echo $this->config->item("url_produk").$v['foto_produk'] ?>" width="200">
          </td>
          <td>
            <a href="<?php echo base_url("produk/detail/" . $v["id_produk"]) ?>" class="btn btn-info text-white">Detail</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>