<div class="container mt-5">
<h5 class="text-center mb-4" style="color: #ec407a;">Ubah Akun</h5>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Card untuk form -->
            <div class="card shadow-sm border-light rounded">
                <div class="card-body">
                    <form method="post">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">
                                <i class="fas fa-user"></i> Username
                            </label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username', $this->session->userdata('username')) ?>">
                            <span class="small text-danger"><?php echo form_error('username'); ?></span>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika password tidak diubah">
                            <p class="text-muted">Kosongkan jika password tidak diubah</p>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="nama_admin" class="form-label">
                                <i class="fas fa-id-card"></i> Nama Lengkap
                            </label>
                            <input type="text" name="nama_admin" id="nama_admin" class="form-control" value="<?php echo set_value('nama_admin', $this->session->userdata('nama_admin')) ?>">
                            <span class="small text-danger"><?php echo form_error('nama_admin'); ?></span>
                        </div>
                        <!-- Button Ubah Akun -->
                        <button class="btn btn-soft-pink w-100 mt-3" type="submit">
                            <i class="fas fa-save"></i> Ubah Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
