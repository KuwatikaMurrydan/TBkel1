<?php
require 'functions.php';

// Periksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel "user"
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

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

  <title>DAFTAR USER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="img-katalog/logo.png" type="image/x-icon" />

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
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;">ADMIN</span>

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
        <a class="nav-link " href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- kelola user -->
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Kelola User</span>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="tambahuser.php">
              <i class="bi bi-circle"></i><span>Tambah User</span>
            </a>
          </li>
          <li>
            <a href="daftaruser.php" class="active">
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
  <!-- kelola user -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item">Kelola User</li>
          <li class="breadcrumb-item active">Daftar User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">BERIKUT USER / PELANGGAN SETIA ABXY OUTDOOR</h5>

              <!-- Table with stripped rows -->
              <div class="table-container">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Tipe User</th> <!-- Ganti judul kolom -->
                      <th>Nama User</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Tanggal Daftar</th>
                      <th>Gambar User</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Ambil data user dan tipe user dari database dengan JOIN antara tabel user dan tipe_user
                    $query = "SELECT user.id_user, tipe_user.tipe_user, user.nama_user, user.email, user.alamat, user.no_hp, user.tgl_daftar, user.gambar_user
                                                  FROM user
                                                  INNER JOIN tipe_user ON user.id_tipe_user = tipe_user.id_tipe_user";
                    $result = $conn->query($query);

                    // Periksa apakah query berhasil dijalankan
                    if ($result->num_rows > 0) {
                      // Output data dari setiap baris
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>" . $row["tipe_user"] . "</td>"; // Mengambil data tipe_user dari tabel tipe_user
                        echo "<td>" . $row["nama_user"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["no_hp"] . "</td>";
                        echo "<td>" . $row["tgl_daftar"] . "</td>";
                        echo "<td><img src='imglandingpage/" . $row["gambar_user"] . "' alt='Gambar User' width='50'></td>";
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='8'>Tidak ada data yang ditemukan</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

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