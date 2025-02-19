<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <?php foreach ($slider as $key => $value): ?>
      <div class="carousel-item <?php echo $key == 0 ? "active" : "" ?>">
        <img src="<?php echo $this->config->item("url_slider").$value['foto_slider'] ?>" class="d-block w-100">
      </div>
    <?php endforeach ?>
  </div>
 
</div>

<section class="bg-light py-5">
    <div class="container">
        <h5 class="text-center mb-3">Brands</h5>
        <div class="row">
            <?php foreach ($kategori as $key => $value): ?>
                <div class="col-md-4 text-center mb-4">
                    <a href="<?php echo base_url("kategori/detail/" . $value["id_kategori"]) ?>" class="text-decoration-none">
                        <!-- Box-style Image -->
                        <div class="category-box">
                            <img src="<?php echo $this->config->item("url_kategori") . $value["foto_kategori"] ?>" class="img-fluid category-image" alt="<?php echo $value["nama_kategori"] ?>">
                        </div>
                        <h5>
                            <?php echo $value['nama_kategori'] ?>
                        </h5>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<style>
    .category-box {
        width: 100%;
        height: 200px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 8px; 
    }

    .category-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;  
    }

    .col-md-4 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h5 {
        margin-top: 10px;
    }
</style>



<section class="bg-light py-5">
    <div class="container">
        <h5 class="text-center mb-5">Produk Terbaru</h5>
        <div class="row d-flex flex-wrap">
            <?php foreach ($produk as $key => $value): ?>
                <div class="col-md-3 flex-fill mb-4">
                    <a href="<?php echo base_url("produk/detail/" . $value["id_produk"]) ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="<?php echo $this->config->item("url_produk") . $value["foto_produk"] ?>" class="card-img-top" alt="<?php echo $value["nama_produk"] ?>">
                            <div class="card-body text-center">
                                <h6><?php echo $value['nama_produk'] ?></h6>
                                <span>Rp. <?php echo number_format($value["harga_produk"]) ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>




<section class="bg-white py-5">
  <div class="container">
    <h5 class="text-center mb-5">Artikel Produk</h5>
    <div class="row">
      <?php foreach ($artikel as $key => $value): ?>
        <div class="col-md-3">
          <img src="<?php echo $this->config->item("url_artikel").$value["foto_artikel"] ?>" class="w-100">
          <h6 class="mt-3"><?php echo $value['judul_artikel'] ?></h6>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
