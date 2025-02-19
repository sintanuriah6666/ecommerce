<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Marketplace</title>
<!-- Link to Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<!-- Custom CSS for design -->
<style>
    body {
        background-color: #fce4ec; 
    }

    .login-card {
        background-color: #ffffff; 
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        padding: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 500px; 
        margin: 0 auto;
    }

    .login-card:hover {
        transform: translateY(-5px); 
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
    }

    .btn-pink {
        background-color: #ec407a;
        border: none;
        color: white;
        border-radius: 30px;
        padding: 14px 30px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #d81b60; 
    }

    .form-control {
        border-radius: 10px; 
        border: 1px solid #ec407a; 
    }

    .form-control:focus {
        border-color: #d81b60; 
        box-shadow: 0 0 5px rgba(233, 30, 99, 0.5); 
    }

    .text-danger.small {
        font-size: 0.875rem;
    }

    .container {
        max-width: 600px; 
    }

</style>
<link rel="icon" type="image/x-icon" href="<?php echo $this->config->item("url_favicon")."favicon.png" ?>">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="login-card">
                <form method="post">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo set_value("username") ?>">
                        <span class="text-danger small"><?php echo form_error("username") ?></span>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo set_value("password") ?>">
                        <span class="text-danger small"><?php echo form_error("password") ?></span>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
    <button type="submit" class="btn btn-pink w-100">Login</button>
    <a href="<?php echo $this->config->item('url_member'); ?>" class="btn btn-pink w-100">Login Member</a>
</div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if ($this->session->flashdata('pesan_sukses')): ?>
<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success"); </script>
<?php endif; ?>

<?php if ($this->session->flashdata('pesan_gagal')): ?>
<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error"); </script>
<?php endif; ?>

</body>
</html>
