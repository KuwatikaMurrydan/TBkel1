<?php
require 'functions.php';
if (!isset($_SESSION['id_user'])) {
  // Jika tidak, redirect ke halaman login atau tindakan lainnya
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN</title>
  <link rel="icon" href="img-katalog/logo.png" type="image/x-icon" />
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="imglandingpage/logoabxy.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="imglandingpage/curug.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">ADMIN</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>ADMIN</h6>
              <span>ABXY OUTDOOR</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="abxy.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin.php" class="active">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- kelola user -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Kelola User</span>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="tambahuser.php">
              <i class="bi bi-circle"></i><span>Tambah User</span>
            </a>
          </li>
          <li>
            <a href="daftaruser.php">
              <i class="bi bi-circle"></i><span>Daftar User</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- barang  -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Kelola Barang</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="stok-barang.php">
              <i class="bi bi-circle"></i><span>Stok Barang</span>
            </a>
          </li>
          <li>
            <a href="tambah-barang.php"> <!-- Tambahkan kelas "active" di sini -->
              <i class="bi bi-circle"></i><span>Tambah Barang</span>
            </a>
          </li>
          <li>
            <a href="kategori.php">
              <i class="bi bi-circle"></i><span>Kategori Barang</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- riwayat -->
      <li class="nav-item">
        <a class="nav-link" href="riwayat.php">
          <i class="bi bi-gem"></i><span>Riwayat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li>


  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <?php
            // Query SQL untuk menghitung jumlah barang
            $sql_count_barang = "SELECT COUNT(*) AS total_barang FROM barang";
            $result_count_barang = $conn->query($sql_count_barang);

            // Periksa apakah query berhasil dieksekusi
            if ($result_count_barang) {
              if ($result_count_barang->num_rows > 0) {
                // Ambil hasil perhitungan jumlah barang
                $row_count_barang = $result_count_barang->fetch_assoc();
                $total_barang = $row_count_barang['total_barang'];

                // Tampilkan jumlah barang pada Sales Card
                echo '<!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                          <div class="card info-card sales-card">
                            <div class="card-body">
                              <h5 class="card-title">Jumlah Barang <span>| Tersedia</span></h5>
                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                  <h6>' . $total_barang . '</h6>
                                  <span class="text-muted small pt-2 ps-1">stok barang tersedia</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!-- End Sales Card -->';
              } else {
                echo "Tidak ada data barang yang tersedia.";
              }
            } else {
              // Tampilkan pesan kesalahan jika query gagal
              echo "Error: " . $conn->error;
            }
            ?>


            <?php
            // Query untuk menghitung jumlah kategori
            $sql_count_kategori = "SELECT COUNT(*) AS total_kategori FROM kategori";
            $result_count_kategori = $conn->query($sql_count_kategori);

            // Periksa apakah query berhasil dieksekusi
            if ($result_count_kategori) {
              // Ambil hasil perhitungan
              $total_kategori = $result_count_kategori->fetch_assoc()['total_kategori'];
              ?>
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Jumlah Kategori <span>| Barang</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-archive"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo $total_kategori; ?></h6>
                        <span class="text-muted small pt-2 ps-1">kategori barang tersedia</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            } else {
              echo "Error: " . $conn->error;
            }
            ?>


            <?php
            // Hitung jumlah admin
            $sql_count_admin = "SELECT COUNT(*) AS total_admin FROM user WHERE id_tipe_user = 'TPADMINNNA'";
            $result_count_admin = $conn->query($sql_count_admin);

            // Hitung jumlah operator
            $sql_count_operator = "SELECT COUNT(*) AS total_operator FROM user WHERE id_tipe_user = 'TPOPERATOR'";
            $result_count_operator = $conn->query($sql_count_operator);

            // Periksa apakah query berhasil dieksekusi
            if ($result_count_admin && $result_count_operator) {
              // Ambil hasil perhitungan
              $total_admin = $result_count_admin->fetch_assoc()['total_admin'];
              $total_operator = $result_count_operator->fetch_assoc()['total_operator'];
              ?>
              <!-- Customers Card -->
              <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="card-body">
                    <h5 class="card-title">Jumlah Pengguna</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>Total Admin: <?php echo $total_admin; ?></h6>
                        <h6>Total Operator: <?php echo $total_operator; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            } else {
              echo "Error: " . $conn->error;
            }
            ?>


            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files -->
            <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/chart.js/chart.umd.js"></script>
            <script src="assets/vendor/echarts/echarts.min.js"></script>
            <script src="assets/vendor/quill/quill.js"></script>
            <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>

</body>

</html>