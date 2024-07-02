<?php
// Halaman pengelolaan peminjaman buku perpustakaan
require "../../config/config.php";
$dataPeminjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, member.kelas, member.jurusan, peminjaman.id_admin,  peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian 
FROM peminjaman 
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Kelola peminjaman buku || admin</title>
     <style>
      .social-links {
        display: flex;
        justify-content: center;
        gap: 10px; /* Jarak antara ikon */
      }

      .social-links a {
        display: inline-block;
        width: 40px; /* Lebar ikon */
        height: 40px; /* Tinggi ikon */
        line-height: 40px; /* Membuat ikon menjadi pusat secara vertikal */
        text-align: center;
        background-color: #f0f0f0; /* Warna latar belakang ikon */
        border-radius: 50%; /* Membuat bentuk lingkaran */
        transition: background-color 0.3s ease; /* Transisi perubahan warna latar belakang */
      }

      .social-links a:hover {
        background-color: #e0e0e0; /* Warna latar belakang ikon saat dihover */
      }

      .social-links a i {
        font-size: 24px; /* Ukuran ikon */
        color: #333; /* Warna ikon */
        transition: color 0.3s ease; /* Transisi perubahan warna ikon */
      }

      .social-links a:hover i {
        color: #007bff; /* Warna ikon saat dihover */
      }
    </style>
  </head>
  <body>
    
  <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logoNavPustaKita.png" alt="logo" width="120px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
      </div>
    </nav>

    <div class="p-4 mt-5">
  
    <div class="mt-5">
    <caption>List of Peminjaman</caption>
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
            <th class="bg-primary text-light">Id Peminjaman</th>
            <th class="bg-primary text-light">Id Buku</th>
            <th class="bg-primary text-light">Judul Buku</th>
            <th class="bg-primary text-light">Nisn Siswa</th>
            <th class="bg-primary text-light">Nama siswa</th>
            <th class="bg-primary text-light">Kelas</th>
            <th class="bg-primary text-light">Jurusan</th>
            <th class="bg-primary text-light">Id Admin</th>
            <th class="bg-primary text-light">Tanggal Peminjaman</th>
            <th class="bg-primary text-light">Tanggal Pengembalian</th>
          </tr>
        </thead>
       <?php foreach ($dataPeminjam as $item) : ?>
      <tr>
       <td><?= $item["id_peminjaman"]; ?></td>
      <td><?= $item["id_buku"]; ?></td>
      <td><?= $item["judul"]; ?></td>
      <td><?= $item["nisn"]; ?></td>
      <td><?= $item["nama"]; ?></td>
      <td><?= $item["kelas"]; ?></td>
      <td><?= $item["jurusan"]; ?></td>
      <td><?= $item["id_admin"]; ?></td>
      <td><?= $item["tgl_peminjaman"]; ?></td>
      <td><?= $item["tgl_pengembalian"]; ?></td>
      </tr>
      <?php endforeach;?>
    </table>
    </div>
    </div>
  </div>
  
  <footer id="footer" class="p-3 bg-dark">
      <div class="row">
        <div class="col">
          <img src="../assets/logoFooterPustaKita.png" width="200px">
        </div>
      </div>
      <div class="row p-3">
        <div class="col mt-3">
          <h3 class="text-light fs-5">Alamat</h3>
          <p class="text-secondary fs-6">Jalan Gatot Subroto No. 31, Bojongbata, Kec. Pemalang, Kabupaten Pemalang, Jawa Tengah 52319</p>
        </div>
        <hr class="text-light mt-3">
        <div class="d-flex justify-content-center gap-4">
          <a href="" class="fs-3"><i class="fa-brands fa-github"></i></a>
          <a href="" class="fs-3"><i class="fa-brands fa-telegram"></i></a>
          <a href="" class="fs-3"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <p class="text-light"> &copy; <a href="" class="text-decoration-none">PustaKita</a>  2024</p>
        </div>
      </div>
    </footer>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>