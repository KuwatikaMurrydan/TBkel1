<?php
require 'functions.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
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

    <title>OPERATOR</title>
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
            <a href="user.php" class="logo d-flex align-items-center">
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
                        <span class="d-none d-md-block dropdown-toggle ps-2">OPERATOR</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>OPERATOR</h6>
                            <span>ABXY OUTDOOR</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
                <a class="nav-link " href="user.php" class="active">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="daftaruser-op.php">
                    <i class="bi bi-menu-button-wide"></i><span>Kelola User</span>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="daftaruser-op.php">
                            <i class="bi bi-circle"></i><span>Daftar User</span>
                        </a>
                    </li>
                </ul>
            </li>



            <!-- barang  -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Kelola Barang</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="stok-barang-op.php">
                            <i class="bi bi-circle"></i><span>Stok Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="tambah-barang-op.php"> <!-- Tambahkan kelas "active" di sini -->
                            <i class="bi bi-circle"></i><span>Tambah Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="kategori-op.php">
                            <i class="bi bi-circle"></i><span>Kategori Barang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- riwayat -->
            <li class="nav-item">
                <a class="nav-link" href="riwayat-op.php">
                    <i class="bi bi-gem"></i><span>Riwayat</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>


    </aside><!-- End Sidebar-->


    <!-- main section -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                    <li class="breadcrumb-item">Kelola Barang</li>
                    <li class="breadcrumb-item active">Tambah Barang</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">SILAHKAN TAMBAH STOK BARANG ABXY</h5>
                            <form class="tambah-barang" action="tambah-barang.php" method="post"
                                enctype="multipart/form-data">
                                <div class="box-register">
                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Masukan Nama Barang :</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                            placeholder="Contoh : Tenda Dhaulagiri Kapasitas 2 Orang Single Layer">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Pilih Kategori Barang:</label>
                                        <select class="form-select" id="kategori" name="kategori">
                                            <?php
                                            // Ambil data kategori dari database
                                            $sql_kategori = "SELECT * FROM kategori";
                                            $result_kategori = $conn->query($sql_kategori);

                                            // Periksa apakah query berhasil dieksekusi
                                            if ($result_kategori) {
                                                if ($result_kategori->num_rows > 0) {
                                                    // Loop melalui hasil query dan tampilkan opsi kategori
                                                    while ($row = $result_kategori->fetch_assoc()) {
                                                        echo "<option value='" . $row['id_kategori'] . "'>" . $row['kategori'] . "</option>";

                                                    }
                                                } else {
                                                    echo "<option value=''>Tidak ada kategori yang tersedia</option>";
                                                }
                                            } else {
                                                // Tampilkan pesan kesalahan jika query gagal
                                                echo "Error: " . $conn->error;
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Masukan Harga Barang:</label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            placeholder="Contoh : 20000">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar_barang" class="form-label">Masukkan Foto Barang:</label>
                                        <input type="file" class="form-control" id="gambar_barang" name="gambar_barang">
                                    </div>
                                    <div class="form-group-submit">
                                        <button type="submit" class="btn btn-primary" name="tambahbarang">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <!-- Table with stripped rows -->
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">BERIKUT STOK BARANG YANG TERSEDIA</h5>

                                            <!-- Table with stripped rows -->
                                            <div class="table-container">
                                                <table class="table datatable" action="" method="post">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Barang</th>
                                                            <th>Nama User</th> <!-- Ganti ID User dengan Nama User -->
                                                            <th>Nama Barang</th>
                                                            <th>Kategori</th>
                                                            <!-- Ganti ID Kategori dengan Nama Kategori -->
                                                            <th>Harga</th>
                                                            <th>Gambar</th>
                                                            <th>Tanggal Masuk</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Ambil data barang dari database dengan INNER JOIN antara tabel barang, user, dan kategori
                                                        $query = "SELECT barang.id_barang, user.nama_user, barang.nama_barang, kategori.kategori, barang.harga, barang.gambar_barang, barang.tanggal_masuk
                                          FROM barang
                                          INNER JOIN user ON barang.id_user = user.id_user
                                          INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori";
                                                        $result = $conn->query($query);

                                                        // Periksa apakah query berhasil dijalankan
                                                        if ($result->num_rows > 0) {
                                                            // Output data dari setiap baris
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<tr>";
                                                                echo "<td>" . $row["id_barang"] . "</td>";
                                                                echo "<td>" . $row["nama_user"] . "</td>"; // Mengambil data nama_user dari tabel user
                                                                echo "<td>" . $row["nama_barang"] . "</td>";
                                                                echo "<td>" . $row["kategori"] . "</td>"; // Mengambil data nama_kategori dari tabel kategori
                                                                echo "<td>" . $row["harga"] . "</td>";
                                                                echo "<td>
                                                <a href='imglandingpage/" . $row["gambar_barang"] . "' target='_blank'>
                                                    <img src='imglandingpage/" . $row["gambar_barang"] . "' alt='Gambar Barang' width='50'>
                                                </a>
                                              </td>";
                                                                echo "<td>" . $row["tanggal_masuk"] . "</td>";
                                                                echo "</tr>";


                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='7'>Tidak ada data yang ditemukan</td></tr>";
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


    <!-- JavaScript to show the modal if edit_id is set in the URL -->
    <?php if (isset($_GET['edit_id'])): ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            myModal.show();
        </script>
    <?php endif; ?>


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
    <script>
        <?php if (isset($_GET['edit_id'])) { ?>
            // Tampilkan modal edit ketika parameter edit_id ada dalam URL
            $(document).ready(function () {
                $('#editModal').modal('show');
            });
        <?php } ?>

        // Fungsi untuk kembali ke halaman sebelumnya setelah mengklik tombol "Update"
        function backToPreviousPage() {
            window.history.back();
        }
    </script>
</body>

</html>