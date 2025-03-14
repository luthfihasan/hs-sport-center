<?php
session_start();
require "functions.php";

$id_user = $_SESSION["id_user"];

$profil = query("SELECT * FROM user_212279 WHERE 212279_id_user = '$id_user'")[0];


if (isset($_POST["simpan"])) {
  if (edit($_POST) > 0) {
    echo "<script>
          alert('Berhasil Diubah');
          </script>";
  } else {
    echo "<script>
          alert('Gagal Diubah');
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport Center</title>

  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
  <!-- Navbar -->
  <div class="container">
    <nav class="navbar fixed-top bg-danger navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="kon1.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top rounded-circle">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-bold">
            <li class="nav-item ">
              <a class="nav-link active text-white fw-bold" aria-current="page" href="#beranda">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#bayar">Tata Cara</a>
            </li>
            <?php
            if (isset($_SESSION['id_user'])) {
              echo '
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="user/lapangan.php">Lapangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="user/bayar.php">Pembayaran</a>
            </li>
            ';
            }
            ?>
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#contact">Kontak</a>
            </li>
          </ul>
          <?php
          if (isset($_SESSION['id_user'])) {
            // jika user telah login, tampilkan tombol profil dan sembunyikan tombol login
            echo '<a href="user/profil.php" data-bs-toggle="modal" data-bs-target="#profilModal" class="btn btn-inti"><i data-feather="user"></i></a>';
          } else {
            // jika user belum login, tampilkan tombol login dan sembunyikan tombol profil
            echo '<a href="login.php" class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</a>';
          }
          ?>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Navbar -->

  <!-- Modal Profil -->
  <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profilModalLabel">Profil Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-4 my-5">
                <img src="img/<?= $profil["212279_foto"]; ?>" alt="Foto Profil" class="img-fluid ">
              </div>
              <div class="col-8">
                <h5 class="mb-3"><?= $profil["212279_nama_lengkap"]; ?></h5>
                <p><?= $profil["212279_jenis_kelamin"]; ?></p>
                <p><?= $profil["212279_email"]; ?></p>
                <p><?= $profil["212279_no_handphone"]; ?></p>
                <p><?= $profil["212279_alamat"]; ?></p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#editProfilModal" class="btn btn-inti">Edit Profil</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Profil -->

  <!-- Edit profil -->
  <div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog edit modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfilModalLabel">Edit Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="fotoLama" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_foto"]; ?>">
          <div class="modal-body">
            <div class="row justify-content-center align-items-center">
              <div class="mb-3">
                <img src="img/<?= $profil["212279_foto"]; ?>" alt="Foto Profil" class="img-fluid ">
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                  <input type="text" name="212279_nama_lengkap" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_nama_lengkap"]; ?>">
                </div>
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if ($profil['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($profil['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for=212279_" class="form-label">No Telp</label>
                  <input type="number" name="212279_no_handphone" 212279_class"form-control" id="exampleInputPassword1" value="<?= $profil["212279_no_handphone"]; ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_email"]; ?>">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">212279_alamat</label>
                <input type="text" name="212279_alamat" class="form-control" id="exampleInputPassword1" value="<?= $profil["212279_alamat"]; ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto : </label>
                <input type="file" name="212279_foto" class="form-control" id="exampleInputPassword1">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-inti" name="simpan" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->
  <div id="beranda" class="container-flui bg-warning pt-5">
    <section class="text-center">
      <h1 class="text-white">Sehatkan Dirimu Dengan Berolahraga di <span class="text-dark">HS Sport</span> Center </h1>
      <h5 class="fw-bold font-monospace mt-4">
        Yuk Segera Booking Lapangan disini!
      </h5>
      <a href="user/lapangan.php" class="btn btn-success mt-4">Sewa Lapangan Sekarang</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 310">
        <path fill="#FEFAE0" fill-opacity="1" d="M0,160L48,160C96,160,192,160,288,176C384,192,480,224,576,202.7C672,181,768,107,864,101.3C960,96,1056,160,1152,176C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
  </div>

  <!-- About -->
  <section class="about mb-5" id="tentang">
    <h2 data-aos="fade-down" data-aos-duration="1000">
      <span>Tentang</span> Kami
    </h2>
    <div class="row">
      <div class="about-img img-thumbnail" data-aos="fade-right" data-aos-duration="1000">
        <img src="img/futsal.jpg" alt="" />
      </div>
      <div class="contain" data-aos="fade-left" data-aos-duration="1000">
        <h4 class="text-center mb-3">Kenapa Memilih kami?</h4>
        <p style="font-size: 20px;"> HS Sport Center adalah pusat olahraga yang menyediakan berbagai fasilitas dan layanan penyewaan lapangan untuk berbagai jenis olahraga. Tempat ini dirancang untuk memfasilitasi kegiatan olahraga bagi kelompok dan komunitas yang memiliki minat dalam berpartisipasi dalam aktivitas fisik. HS Sport Center menawarkan beragam jenis lapangan yang dapat disewa untuk berbagai jenis olahraga, seperti Voly, Futsal, Tenis Meja, Basket, dan masih banyak lagi. Setiap lapangan dilengkapi dengan fasilitas yang sesuai, termasuk garis-garis permainan, jaring, dan peralatan yang dibutuhkan untuk menjalankan aktivitas olahraga dengan lancar dan nyaman.</p>
      </div>
    </div>
  </section>

  <!-- End About -->

  <!-- Pembayaran -->
  <section class="pembayaran" style="background-color : #FEFAE0" ; id="bayar">
    <h2 data-aos="fade-down" data-aos-duration="1000">
      <span>Tata Cara</span> Pembayaran
    </h2>
    <p class="text-center">Berikut adalah tata cara penyewaan lapangan pada website HS Sport Center:</p>
    <ul class="border list-group list-group-flush mt-4 mb-5">
      <li class="list-group-item">1. Pengguna harus membuat akun atau mendaftar sebagai anggota pada website HS Sport Center.</li>
      <li class="list-group-item">2. Pengguna dapat memilih Jenis Lapangan yang ingin dipesan, memilih Tanggal dan Waktu Tertentu.</li>
      <li class="list-group-item">3. Pengguna harus memilih Tanggal dan Waktu, melihat harga sewa lapangan, mengisi jumlah jam atau durasi, melengkapi formulir pemesanan.</li>
      <li class="list-group-item">4. Bila Dirasa sudah sesuai, pengguna dapat meng klik tombol pesan.</li>
      <li class="list-group-item">5. Lalu pengguna akan diarahkan ke menu pembayaran</li>
      <li class="list-group-item">5. Lakukan pembayaran ke rekening yang sudah tertera dan upload bukti pembayaran</li>
      <li class="list-group-item">5. Setelah upload, Tunggu admin menyetujui pembayaran anda</li>
      <li class="list-group-item">5. Setelah status sudah di setujui, Silahkan datang ke HS Sport Center sesuai jadwal yang di pesan</li>
    </ul>
  </section>
  <!-- End Pembayaran -->

  <!-- Contact -->
  <section id="contact" class="contact" data-aos="fade-down" data-aos-duration="1000">
    <h2><span>Kontak</span> Kami</h2>
    <p class="text-center m-5">
      Hubungi kami jika ada saran yang ingin di sampaikan
    </p>
    <form>
    <div class="input-group flex-nowrap mt-4">
      <span class="input-group-text" id="addon-wrapping"><i class="bi bi-people-fill"></i></span>
      <input type="text" class="form-control" placeholder="Nama" aria-label="nama" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mt-4">
      <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope-fill"></i></span>
      <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mt-4">
      <span class="input-group-text" id="addon-wrapping"><i class="bi bi-telephone-fill"></i></span>
      <input type="text" class="form-control" placeholder="No Telp" aria-label="no telp" aria-describedby="addon-wrapping">
    </div>
    <div class="form-floating mt-4">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
      <label for="floatingTextarea">Komen</label>
    </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Pesan</button>
      </form>
    </div>
    </div>
  </section>
  <!-- End Contact -->

  <!-- footer -->
  <footer class="bg-danger">
    <div class="social">
      <a href="#" style="font-size: 25px;"><i class="bi bi-whatsapp"></i></a>
      <a href="#" style="font-size: 25px;"><i class="bi bi-instagram"></i></a>
      <a href="#" style="font-size: 25px;"><i class="bi bi-youtube"></i></a>
      <a href="#" style="font-size: 25px;"><i class="bi bi-github"></i></a>
    </div>


    <div class="credit font-monospace fw-bold text-white">
      <p>Created by Luthfi Hasan | RPL 2022</p>
    </div>
  </footer>
  <!-- End Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  < script>
    feather.replace();
    </script>
</body>

</html>