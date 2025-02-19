<div class="container py-3">
    <h5>Brands</h5>
    <div class="row">
        <?php foreach ($kategori as $key => $value): ?>
            <div class="col-md-4 flex-fill mb-4">
            <a href="<?php echo base_url("kategori/detail/" . $value["id_kategori"]) ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm">
                    <img src="<?php echo $this->config->item("url_kategori") . $value["foto_kategori"] ?>">
                    <div class="card-body text-center">
                        <h6><?php echo $value['nama_kategori'] ?></h6>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach ?>
    </div>
</div>
