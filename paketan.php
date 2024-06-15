<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PAKETAN</title>
  <!-- logo my title bar -->
  <link rel="icon" href="img-paketan/logo.png" type="image/x-icon" />
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

  <!-- Paketan -->
  <section class="paketan">
    <div class="container h-100">
      <div class="row h-100">
        <div class="box-paketan">
          <div class="col-12 text-center">
            <h1 class="title-paketan">PAKETAN</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p class="desc-paketan">Pilih paketan yang sesuai dengan kebutuhanmu</p>
          </div>
        </div>
        <div class="row2">
          <div class="col-12 text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product1.jpeg" alt="PAKET 1"
                  width="300PX"></button>
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product2.jpeg" alt="PAKET 2"
                  width="300PX"></button>
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product3.jpeg" alt="PAKET 3"
                  width="300PX"></button>
            </div>
          </div>
        </div>
        <div class="row2">
          <div class="col-12 text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product4.jpeg" alt="PAKET 4"
                  width="300PX"></button>
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product5.jpeg" alt="PAKET 5"
                  width="300PX"></button>
              <button type="button" class="btn btn-paketan"><img src="img-paketan/product6.jpeg" alt="PAKET 6"
                  width="300PX"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>