<?php
require 'functions.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Lakukan kueri SQL untuk mendapatkan data pengguna berdasarkan email
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    // Verifikasi password
    if (password_verify($password, $row["password"])) {
      // Jika password benar, arahkan ke halaman yang sesuai dengan tipe pengguna
      if ($row["id_tipe_user"] === "TPADMINNNA") {
        // Mulai sesi dan simpan data pengguna
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama_user'] = $row['nama_user'];

        // Redirect ke halaman admin
        header("Location: admin.php");
        exit;
      } else if ($row["id_tipe_user"] === "TPOPERATOR") {
        // Mulai sesi dan simpan data pengguna
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama_user'] = $row['nama_user'];

        // Redirect ke halaman user
        header("Location: user.php");
        exit;
      }
    } else {
      // Jika password salah, set error
      $error = "Email atau password salah!";
    }
  } else {
    // Jika tidak ada hasil dari kueri atau pengguna tidak ditemukan, set error
    $error = "Akun tidak ditemukan!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- logo my title bar -->
  <link rel="icon" href="imglogin/logo.png" type="image/x-icon" />
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- MYfont -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Mystyle -->
  <link rel="stylesheet" href="styles.css" />
  <style>
    /* Ensure Feather Icons are correctly loaded */
    [data-feather] {
      width: 24px;
      height: 24px;
    }
  </style>
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
            <a class="nav-link" aria-current="page" href="abxy.php">HOME</a>
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

  <!-- LOGIN -->
  <div class="bg-image">
    <div class="container login-container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h1 class="text-center mb-4 textselamat">LOGIN</h1>
          <div class="box-login">
            <?php if (isset($error)): ?>
              <p>
                user name atau password salah!
              </p>
            <?php endif; ?>
            <form action="" method="post">
              <div class="mb-3" style="color: black;">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
              </div>
              <div class="mb-3" style="color: black;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Enter your password">
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
              </div>
            </form>

            <div class="text-center mt-3" style="color: black;">
              <p>Belum punya akun? <a href="register.php ">Daftar</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>