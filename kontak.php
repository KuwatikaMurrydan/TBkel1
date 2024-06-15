<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PAKETAN</title>
  <!-- logo my title bar -->
  <link rel="icon" href="img-kontak/logo.png" type="image/x-icon" />
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- MYfont -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Mystyle -->
  <link rel="stylesheet" href="styles.css" />
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
          <button class="button-daftar"><a href="register.php"></a>DAFTAR</button>
          <button class="button-masuk"><a href="login.php"></a>MASUK</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- kontak -->
  <section class="kontak">
    <div class="container">
      <div class="kontak mx-5">
        <h2 class="judul">Kontak Saya</h2>
        <p class="perintah">Silakan isi form di bawah ini untuk menghubungi saya.</p>
        <form>
          <div class="form-group  my-3">
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" placeholder="Nama Anda">
          </div>
          <div class="form-group my-3">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email Anda">
          </div>
          <div class="form-group my-3">
            <label for="pesan">Pesan</label>
            <textarea id="pesan" class="form-control" placeholder="Pesan Anda"></textarea>
          </div>
          <button class="button-daftar" onclick="window.location.href='register.php'">DAFTAR</button>
          <button class="button-masuk" onclick="window.location.href='login.php'">MASUK</button>
        </form>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>