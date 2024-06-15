<?php
require 'functions.php';
if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
      alert('user baru berhasil ditambahkan');
      </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAFTAR</title>
  <!-- logo my title bar -->
  <link rel="icon" href="img-register/logo.png" type="image/x-icon" />
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- MYfont -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Mystyle -->
  <link rel="stylesheet" href="styles-register.css" />
</head>
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg bg-transparent position-fixed w-100">
    <div class="container">
      <a class="navbar-brand mx-3" href="#">
        <img src="imglandingpage/logoabxy.png" alt="ABXY OUTDOOR" width="270">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="abxy.php">HOME</a>
          </li>
          <li class="nav-item  mx-2">
            <a class="nav-link" href="katalog.php">KATALOG</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="paketan.php">PAKETAN</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="kontak.php">KONTAK</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="tentang-abxy.php">TENTANG ABXY</a>
        </ul>
        <div>
          <button class="button-daftar" onclick="window.location.href='register.php'">DAFTAR</button>
          <button class="button-masuk" onclick="window.location.href='login.php'">MASUK</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- REGISTER -->
  <div class="container  h-100">
    <div class="row justify-content-center h-100">
      <div class="col-md-6">
        <form class="register" action="" method="post">
          <h2 class="text-center">DAFTAR</h2>
          <p class="text-center">Sudah punya akun? <a href="login.php" class=""> Masuk</a></p>
          <img class="abxy" src="img-register/logo.png" alt="ABXY OUTDOOR" width="250">
          <div class="box-register">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="nama" class="form-label">Masukan nama :</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="email" class="form-label">Masukan Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="password" class="form-label">Masukan password:</label>
                  <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukan password">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="verifikasi-password" class="form-label">Verifikasi password:</label>
                  <input type="password" class="form-control" id="verifikasi-password" name="confirm_password"
                    placeholder="Verifikasi password">
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-3 mx-5">
                  <label for="tipe-user" class="form-label">Pilih Tipe User:</label>
                  <select class="form-select" id="tipe-user" name="id_tipe_user">
                    <option value="TPADMINNNA">Admin</option>
                    <option value="TPOPERATOR">Operator</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="alamat" class="form-label">Masukan Alamat:</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap">
                </div>
                <div class="mb-3">
                  <label for="no_handphone" class="form-label">Masukan No Handphone:</label>
                  <input type="tel" class="form-control" id="no_handphone" name="no_hp"
                    placeholder="Contoh : 085xxxxx772">
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-3 mx-5">
                  <label for="foto-anda" class="form-label">Masukan Foto Anda:</label>
                  <input type="file" class="form-control" id="foto_anda" name="foto_anda">
                </div>
                <div class="form-group-submit mx-5">
                  <button type="submit" class="btn btn-primary" name="register">Kirim</button>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>