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

// Query untuk mengambil data dari tabel "user"
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TAMBAH USER</title>
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
                        <a href="tambahuser.php" class="active"> <!-- Tambahkan kelas "active" di sini -->
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
                    <i class="bi bi-journal-text"></i><span>Kelola Barang</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="stok-barang.php">
                            <i class="bi bi-circle"></i><span>Stok Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="tambah-barang.php">
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
                <a class="nav-link" href="riwayat.php"> <!-- Ganti data-bs-target dan data-bs-toggle menjadi href -->
                    <i class="bi bi-gem"></i><span>Riwayat</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>



    </aside><!-- End Sidebar-->
    <!-- kelola user -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Kelola User</li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TAMBAH USER / PELANGGAN SETIA ABXY OUTDOOR</h5>
                            <form class="tambahuser" action="tambahuser.php" method="post"
                                enctype="multipart/form-data">
                                <div class="box-register">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Masukkan nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Masukkan Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Masukkan password:</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="verifikasi-password" class="form-label">Verifikasi password:</label>
                                        <input type="password" class="form-control" id="verifikasi-password"
                                            name="confirm_password" placeholder="Verifikasi password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe-user" class="form-label">Pilih Tipe User:</label>
                                        <select class="form-select" id="tipe-user" name="id_tipe_user">
                                            <option value="TPADMINNNA">Admin</option>
                                            <option value="TPPENGGUNA">Operator</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Masukkan Alamat:</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            placeholder="Alamat Lengkap">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_handphone" class="form-label">Masukkan No Handphone:</label>
                                        <input type="tel" class="form-control" id="no_handphone" name="no_hp"
                                            placeholder="Contoh : 085xxxxx772">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto-anda" class="form-label">Masukkan Foto Anda:</label>
                                        <input type="file" class="form-control" id="foto_anda" name="foto_anda">
                                    </div>
                                    <div class="form-group-submit">
                                        <button type="submit" class="btn btn-primary" name="tambahuser">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <!-- Table with stripped rows -->
                        <div class="table-container">
                            <table class="table datatable" action="" method="post">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>ID Tipe User</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Gambar User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Ambil data pengguna dari database
                                    $tampil = query("SELECT * FROM user");

                                    // Loop melalui setiap pengguna dan tampilkan tombol hapus
                                    foreach ($tampil as $user) {
                                        echo "<tr>";
                                        echo "<td>" . $user["id_user"] . "</td>";
                                        echo "<td>" . $user["id_tipe_user"] . "</td>";
                                        echo "<td>" . $user["nama_user"] . "</td>";
                                        echo "<td>" . $user["email"] . "</td>";
                                        echo "<td>" . $user["alamat"] . "</td>";
                                        echo "<td>" . $user["no_hp"] . "</td>";
                                        echo "<td>" . $user["tgl_daftar"] . "</td>";
                                        echo "<td>
                                        <a href='imglandingpage/" . $user["gambar_user"] . "' target='_blank'>
                                            <img src='imglandingpage/" . $user["gambar_user"] . "' alt='Gambar User' width='50'>
                                        </a>
                                        </td>";

                                        echo "<td>
                                        <a href='?edit_id=" . $user['id_user'] . "&edit_name=" . $user['nama_user'] . "&edit_email=" . $user['email'] . "&edit_address=" . $user['alamat'] . "&edit_phone=" . $user['no_hp'] . "&edit_image=" . $user['gambar_user'] . "&edit_user_type=" . $user['id_tipe_user'] . "' class='btn btn-primary'>
                                            Edit
                                        </a>
                                        </td>";


                                        echo "<td>
                                        <form action=\"\" method=\"GET\" onsubmit=\"return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');\">
                                            <input type=\"hidden\" name=\"id_user\" value=\"" . $user['id_user'] . "\">
                                            <button type=\"submit\" name=\"hapus_user\">Hapus</button>
                                        </form>
                                        </td>";



                                        echo "</tr>";
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

    <!-- Modal -->
    <div class="modal fade <?php if (isset($_GET['edit_id'])) {
        echo 'show';
    } ?>" id="editModal" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true" <?php if (isset($_GET['edit_id'])) {
            echo 'style="display: block;"';
        } ?>>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <a href="tambahuser.php" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form action="tambahuser.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="edit-id_user" name="id_user"
                            value="<?php echo isset($_GET['edit_id']) ? $_GET['edit_id'] : ''; ?>">
                        <?php if (isset($_GET['edit_name'])): ?>
                            <div class="mb-3">
                                <label for="edit-nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="edit-nama" name="nama"
                                    value="<?php echo $_GET['edit_name']; ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_GET['edit_email'])): ?>
                            <div class="mb-3">
                                <label for="edit-email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="edit-email" name="email"
                                    value="<?php echo $_GET['edit_email']; ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_GET['edit_user_type'])): ?>
                            <div class="mb-3">
                                <label for="edit-tipe-user" class="form-label">Tipe User:</label>
                                <select class="form-select" id="edit-tipe-user" name="id_tipe_user">
                                    <option value="TPADMINNNA" <?php echo $_GET['edit_user_type'] == 'TPADMINNNA' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="TPPENGGUNA" <?php echo $_GET['edit_user_type'] == 'TPPENGGUNA' ? 'selected' : ''; ?>>Operator</option>
                                </select>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_GET['edit_address'])): ?>
                            <div class="mb-3">
                                <label for="edit-alamat" class="form-label">Alamat:</label>
                                <input type="text" class="form-control" id="edit-alamat" name="alamat"
                                    value="<?php echo $_GET['edit_address']; ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_GET['edit_phone'])): ?>
                            <div class="mb-3">
                                <label for="edit-no_handphone" class="form-label">No Handphone:</label>
                                <input type="tel" class="form-control" id="edit-no_handphone" name="no_hp"
                                    value="<?php echo $_GET['edit_phone']; ?>">
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_GET['edit_image'])): ?>
                            <div class="mb-3">
                                <label for="edit-foto-anda" class="form-label">Foto Anda:</label>
                                <!-- Tampilkan gambar pengguna -->
                                <img src="imglandingpage/<?php echo $_GET['edit_image']; ?>" alt="Gambar User" width="100"
                                    class="mt-2">
                                <!-- Simpan nama gambar yang sudah ada dalam input tersembunyi -->
                                <input type="hidden" name="edit_image" value="<?php echo $_GET['edit_image']; ?>">
                                <br>
                                <label for="edit-new-foto-anda" class="form-label">Pilih foto baru:</label>
                                <input type="file" class="form-control" id="edit-new-foto-anda" name="foto_anda">
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label for="edit-foto-anda" class="form-label">Foto Anda:</label>
                                <input type="file" class="form-control" id="edit-foto-anda" name="foto_anda">
                            </div>
                        <?php endif; ?>


                        <div class="form-group-submit">
                            <button type="submit" class="btn btn-primary" name="updateuser"
                                onclick="backToPreviousPage()">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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