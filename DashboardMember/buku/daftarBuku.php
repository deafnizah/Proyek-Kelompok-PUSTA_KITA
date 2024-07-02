<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";
// query read semua buku
$buku = queryReadData("SELECT * FROM buku");
//search buku
if(isset($_POST["search"]) ) {
  $buku = search($_POST["keyword"]);
}
//read buku informatika
if(isset($_POST["informatika"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
}
//read buku bisnis
if(isset($_POST["bisnis"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
}
//read buku filsafat
if(isset($_POST["filsafat"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
}
//read buku novel
if(isset($_POST["novel"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
}
//read buku sains
if(isset($_POST["sains"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Daftar Buku || Member</title>
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
  <style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
  </style>
  <body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logoNavPustaKita.png" alt="logo" width="120px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
    </nav>
    
     <div class="p-4 mt-5">
       <!--Btn filter data kategori buku-->
      <div class="d-flex gap-2 mt-5 justify-content-center">
      <form action="" method="post">
        <div class="layout-card-custom">
         <button class="btn btn-primary" type="submit">Semua</button>
         <button type="submit" name="informatika" class="btn btn-outline-primary">Informatika</button>
         <button type="submit" name="bisnis" class="btn btn-outline-primary">Bisnis</button>
         <button type="submit" name="filsafat" class="btn btn-outline-primary">Filsafat</button>
         <button type="submit" name="novel" class="btn btn-outline-primary">Novel</button>
         <button type="submit" name="sains" class="btn btn-outline-primary">Sains</button>
         </div>
        </form>
       </div>
       
       <form action="" method="post" class="mt-5">
       <div class="input-group d-flex justify-content-end mb-3">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari judul atau kategori buku...">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <!--Card buku-->
    <div class="layout-card-custom">
       <?php foreach ($buku as $item) : ?>
       <div class="card" style="width: 15rem;">
         <img src="../../imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="250px">
         <div class="card-body">
           <h5 class="card-title"><?= $item["judul"]; ?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
          </ul>
        <div class="card-body">
          <a class="btn btn-success" href="detailBuku.php?id=<?= $item["id_buku"]; ?>">Detail</a>
          </div>
        </div>
       <?php endforeach; ?>
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