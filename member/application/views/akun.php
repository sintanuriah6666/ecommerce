<div class="container mt-5">
    <h5 class="text-center mb-4" style="color: #ec407a;">Ubah Akun</h5> <!-- Judul dengan warna pink lembut -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Card untuk form -->
            <div class="card shadow-sm border-light rounded">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="email_member" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="text" name="email_member" id="email_member" class="form-control" value="<?php echo set_value('email_member', $this->session->userdata('email_member')) ?>">
                            <span class="small text-danger"><?php echo form_error('email_member'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="password_member" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" name="password_member" id="password_member" class="form-control" placeholder="Kosongkan jika password tidak diubah">
                            <p class="text-muted">Kosongkan jika password tidak diubah</p>
                        </div>
                        <div class="mb-3">
                            <label for="nama_member" class="form-label">
                                <i class="fas fa-user"></i> Nama Lengkap
                            </label>
                            <input type="text" name="nama_member" id="nama_member" class="form-control" value="<?php echo set_value('nama_member', $this->session->userdata('nama_member')) ?>">
                            <span class="small text-danger"><?php echo form_error('nama'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_member" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Alamat
                            </label>
                            <input type="text" name="alamat_member" id="alamat_member" class="form-control" value="<?php echo set_value('alamat_member', $this->session->userdata('alamat_member')) ?>">
                            <span class="small text-danger"><?php echo form_error('alamat_member'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="wa_member" class="form-label">
                                <i class="fas fa-phone-alt"></i> Nomor WA Member
                            </label>
                            <input type="text" name="wa_member" id="wa_member" class="form-control" value="<?php echo set_value('wa_member', $this->session->userdata('wa_member')) ?>">
                            <span class="small text-danger"><?php echo form_error('wa_member'); ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="kode_distrik_member" class="form-label">
                                <i class="fas fa-city"></i> Kota/Kabupaten
                            </label>
                            <select class="form-control form-select select2" name="kode_distrik_member" id="kode_distrik_member">
                                <option value="">Pilih</option>
                                <?php foreach ($distrik as $key => $value): ?>
                                    <option value="<?php echo $value['city_id'] ?>" <?php echo $value['city_id'] == set_value('city_id', $this->session->userdata('kode_distrik_member')) ? 'selected' : '' ?>>
                                        <?php echo $value['type'] ?> <?php echo $value['city_name'] ?>, <?php echo $value['province'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-muted"><?php echo form_error('city_id'); ?></span>
                        </div>
                        <button class="btn btn-soft-pink w-100 mt-3" type="submit">
                            <i class="fas fa-save"></i> Ubah Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    
    .btn-soft-pink {
        background-color: #ec407a;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }


    .btn-soft-pink:hover {
        background-color: #d81b60; 
        cursor: pointer;
    }


    .form-control {
        border-radius: 0.375rem; 
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
    }


    .form-label {
        font-weight: 600;
        font-size: 1rem;
    }

    
    h5 {
        font-weight: 600;
        font-size: 1.5rem;
        color: #ec407a; 
    }
</style>
