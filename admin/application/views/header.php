<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Marketplace</title>
  <!-- Link to Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="<?php echo $this->config->item('url_favicon') . 'favicon.png' ?>">

  <!-- Custom CSS for design -->
  <style>
    /* Make sure body uses the full height of the viewport */
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      background-color: #fce4ec;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background-color: #ec407a;
      border-bottom: 3px solid #d81b60;
    }

    .navbar-brand, .nav-link {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .nav-link {
      padding: 10px 20px;
      color: white !important;
    }

    .nav-link:hover {
      background-color: #d81b60;
      border-radius: 5px;
    }

    .navbar-nav {
      margin-left: auto;
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

    .btn-custom {
      background-color: #ec407a;
      color: white;
      border: none;
      border-radius: 30px;
      padding: 12px 25px;
      font-size: 16px;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
      background-color: #d81b60;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }

    .table thead {
      background-color: #ec407a;
      color: white;
    }

    .card-body {
      background-color: white;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 20px;
    }

    .table-responsive {
      margin-top: 20px;
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
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark mb-3 custom-navbar">
    <div class="container">
      <a href="#" class="navbar-brand">Admin</a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="naff">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a href="<?php echo base_url('home') ?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?php echo base_url('artikel') ?>" class="nav-link">Articles</a></li>
          <li class="nav-item"><a href="<?php echo base_url('slider') ?>" class="nav-link">Sliders</a></li>
          <li class="nav-item"><a href="<?php echo base_url('kategori') ?>" class="nav-link">Categories</a></li>
          <li class="nav-item"><a href="<?php echo base_url('produk') ?>" class="nav-link">Products</a></li>
          <li class="nav-item"><a href="<?php echo base_url('member') ?>" class="nav-link">Members</a></li>
          <li class="nav-item"><a href="<?php echo base_url('transaksi') ?>" class="nav-link">Transactions</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="<?php echo base_url('akun') ?>" class="nav-link">
              <?php echo $this->session->userdata('nama') ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('logout') ?>" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 