<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Member Marketplace</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="<?php echo $this->config->item("url_favicon")."favicon.png" ?>">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-uoS3rl38chw2a-Pb"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Link to Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="<?php echo $this->config->item('url_favicon') . 'favicon.png' ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    html, body {
  height: 100%;
  margin: 0;
}

body {
  display: flex;
  flex-direction: column;
}

main {
  flex: 1;
}


footer {
      background-color: #ec407a;
      color: white;
      padding: 15px 0;
      font-size: 0.9rem;
      text-align: center;
      margin-top: auto;
    }

    footer .py-3 {
      font-size: 0.9rem;
    }

    .navbar-custom {
      background-color: #f06292;
      border-bottom: 3px solid #e91e63;
    }

    .navbar-custom .navbar-nav .nav-link {
      color: white !important;
    }

    .navbar-custom .navbar-nav .nav-link:hover {
      background-color: #e91e63;
      border-radius: 5px;
    }

    .container h5 {
      color: #ec407a;
      font-weight: bold;
    }

    .table th {
      background-color: #f06292;
      color: white;
    }

    .table td {
      background-color: #ffffff;
    }

    .table-bordered td, .table-bordered th {
      border: 1px solid #f06292;
    }

    .btn-soft-pink {
      background-color: #f06292;
      border: none;
      color: white;
      border-radius: 30px;
      padding: 8px 20px;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .btn-info {
      background-color: #f06292;
      border: none;
      color: white;
      border-radius: 30px;
      padding: 8px 20px;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    .btn-soft-pink:hover {
      background-color: #ec407a;
    }

    .btn-warning {
      background-color: #f8bbd0;
      border: none;
      color: #d81b60;
    }

    .btn-warning:hover {
      background-color: #f06292;
    }

    .btn-soft-pink {
    background-color: #f06292;
    border: none;
    color: white;
    border-radius: 30px;
    padding: 8px 20px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-soft-pink:hover {
    background-color: #ec407a;
}

    .btn-danger {
      background-color: #d81b60;
      border: none;
      color: white;
    }

    .btn-danger:hover {
      background-color: #c2185b;
    }

    .btn-primary {
      background-color: #f06292;
      border: none;
      color: white;
    }

    .btn-primary:hover {
      background-color: #ec407a;
    }
    .navbar {
      background-color: #ec407a; /* Pink background */
      border-bottom: 3px solid #d81b60; /* Slight darker pink border */
    }

    .navbar-brand {
      font-weight: bold;
      color: white !important;
    }

    .navbar-nav .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .navbar-nav .nav-link:hover {
      background-color: #d81b60; /* Hover color */
      border-radius: 5px;
    }

    /* Notification Dropdown */
    .dropdown-menu {
      border-radius: 0.5rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      min-width: 300px;
    }

    .dropdown-item {
      border-bottom: 1px solid #e9ecef;
      transition: background-color 0.3s, color 0.3s;
    }

    .dropdown-item:hover {
      background-color: #f1f1f1;
      color: #333;
    }

    .dropdown-divider {
      margin: 0;
    }

    .navbar-nav .dropdown-toggle::after {
      display: none; /* Hide default dropdown arrow */
    }

    /* For active dropdown items */
    .dropdown-item.active, .dropdown-item:active {
      background-color: #f06292;
      color: white;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a href="" class="navbar-brand">Member</a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="naff">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a href="<?php echo base_url("") ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("kategori") ?>" class="nav-link">Brands</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("produk") ?>" class="nav-link">Produk</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("keranjang") ?>" class="nav-link">Keranjang</a>
          </li>
        </ul>

        <?php if ($this->session->userdata("id_member")): ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Notifications <span class="badge bg-danger"><?php echo count($count_notifikasi); ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                <?php foreach ($notifikasi as $notif): ?>
                  <li>
                    <a class="dropdown-item" href="#" 
                      style="background-color: <?php echo $notif['status'] === 'unread' ? '#e3f2fd' : '#ffffff'; ?>; color: #333; padding: 10px;">
                      <?php echo $notif['isi_notifikasi']; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php if (count($count_notifikasi) != 0): ?>
                  <li style="text-align: center;">
                    <a class="dropdown-item" href="<?php echo base_url('notifikasi/read_all'); ?>" 
                      style="background-color: #007bff; color: #fff; border-radius: 4px; padding: 10px 20px; font-weight: bold;">
                      Read All
                    </a>
                  </li>
                <?php else: ?>
                  <li style="text-align: center;">
                    <a class="dropdown-item" href="#" 
                      style="background-color: #007bff; color: #fff; border-radius: 4px; padding: 10px 20px; font-weight: bold;">
                      No new notifications
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seller
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/produk") ?>">Produk Saya</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/penjualan") ?>">Penjualan Saya</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/dashboard") ?>">Dashboard Penjualan</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("transaksi") ?>">Pembelian Saya</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url("akun") ?>" class="nav-link">
                <?php echo $this->session->userdata("nama_member") ?>                  
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
            </li>
            
          </ul>
        <?php endif ?>
       
            
        <?php if (!$this->session->userdata("id_member")): ?>
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="<?php echo $this->config->item("url_admin") ?>" class="nav-link">Login Admin </a>
            </li>
            <li class="nav-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("register") ?>" class="nav-link">Register</a>
            </li>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </nav>
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
      <script>
          swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");
      </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('pesan_gagal')): ?>
      <script>
          swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");
      </script>
  <?php endif; ?>

</body>
</html>
