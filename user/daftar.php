<?php
require "../functions.php";


if (isset($_POST["daftar"])) {
  if (daftar($_POST) > 0) {
    echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= ../login.php'/>  ";
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <style>
    .center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 800px;
      background: var(--bg);
      border-radius: 10px;
      box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);
    }

    .center h1 {
      text-align: center;
      padding: 20px 0;
      color: var(--primary);
    }

    .center form {
      padding: 0 40px;
      box-sizing: border-box;
    }
  </style>
</head>

<body class="login bg-warning">
  <!-- Navbar -->
  <div class="container">
    <nav class="navbar fixed-top bg-danger navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../kon1.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
      </div>
    </nav>
  </div>
  <!-- End Navbar -->
  <div class="center mt-5" style="background-color : #FEFAE0";>
    <form action="" method="post" enctype="multipart/form-data">
      <h1>Registrasi</h1>
      <div class="row justify-content-center align-items-center">
        <div class="col">
          <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="exampleInputPassword1" required>
          </div>
          <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
          </div>
        </div>
        <div class="col">
          <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">No Hp</label>
            <input type="text" name="hp" class="form-control" id="exampleInputPassword1" required>
          </div>
          <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
          </div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-2 d-flex ">
          <p>Jenis Kelamin : </p>
          <div class="form-check mx-3">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Laki-Laki">
            <label class="form-check-label" for="male">
              Laki-Laki
            </label>
          </div>
          <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan">
            <label class="form-check-label" for="female">
              Perempuan
            </label>
          </div>
        </div>
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label">Foto</label>
          <input type="file" name="foto" class="form-control" id="exampleInputPassword1" required>
        </div>

        <div class="d-flex justify-content-end mt-2 mb-3">
                <a href="../login.php" class="btn btn-secondary me-2">Kembali</a>
                <input type="submit" name="daftar" class="btn btn-primary" value="Daftar">
            </div>
      </div>
    </form>
  </div>
</body>

</html>