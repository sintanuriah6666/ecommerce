<div class="container py-3" >
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $this->config->item("url_produk") . $produk["foto_produk"] ?>" class="w-100" alt="<?php echo $produk["nama_produk"] ?>">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produk["nama_produk"] ?></h1>
            <span class="badge bg-dark"><?php echo $produk["nama_kategori"] ?></span>
            <p class="lead">Rp. <?php echo number_format($produk["harga_produk"]) ?></p>
           

            <p><?php echo $produk["deskripsi_produk"] ?></p>
        </div>
    </div>
</div>
