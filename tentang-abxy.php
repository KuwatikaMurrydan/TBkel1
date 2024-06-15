<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PAKETAN</title>
  <!-- logo my title bar -->
  <link rel="icon" href="img-tentang/logo.png" type="image/x-icon" />
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
          <button class="button-daftar" onclick="window.location.href='register.php'">DAFTAR</button>
          <button class="button-masuk" onclick="window.location.href='login.php'">MASUK</button>
        </div>
      </div>
    </div>
  </nav>

  <!-- tentang abxy -->
  <section class="tentang-abxy">
    <div class="section">
      <div class="container">
        <h2 class="section-title">Tentang Kami</h2>
        <p class="section-text mx-5">ABXY Outdoor merupakan salah satu bisnis sewa alat kemping untuk kegiatan alam
          bebas yang bertempat di Jalan Raya Warung Peuteuy Kp. Cileungsing Rt.02 Rw.07 Ds. Pasawahan Kec.Tarogong Kaler
          Kab. Garut. Bisnis ini berdiri pada tanggal 11 Juli 2022 oleh Toni Nurseha yang terinspirasi dari hobinya
          sendiri yaitu pendaki Gunung.</p>
      </div>
    </div>
    <div class="keunggulan">
      <div class="container">
        <h2 class="section-title-2 ">Keunggulan Kami</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lokasi Strategis</h5>
                <p class="card-text">Lokasi kami yang strategis membuat Anda lebih mudah untuk mencapai tempat tujuan.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Waktu yang Fleksibel</h5>
                <p class="card-text">Kami menawarkan waktu sewa yang fleksibel, yaitu 2 hari 1 malam.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Barang Branded</h5>
                <p class="card-text">penggunaan Barang yang berkualitas untuk memastikan keselamatan dan kenyamanan.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-misi">
      <div class="container">
        <h2 class="section-title">Misi Kami</h2>
        <p class="section-text">Bisnis ini berdiri untuk membantu para giat alam dan sejenisnya untuk dapat menikmati
          kegiatannya dengan aman tanpa harus membeli barang-barang yang sekiranya membutuhkan budget yang besar.</p>
      </div>
    </div>

    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>