<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM member");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Member terdaftar</title>
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
      <!--search engine --->
     <form action="" method="post" class="mt-5">
       <div class="input-group d-flex justify-content-end mb-3">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari data member...">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <caption>List of Member</caption>
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
            <th class="bg-primary text-light">Nisn</th>
            <th class="bg-primary text-light">Kode</th>
            <th class="bg-primary text-light">Nama</th>
            <th class="bg-primary text-light">Jenis Kelamin</th>
            <th class="bg-primary text-light">Kelas</th>
            <th class="bg-primary text-light">Jurusan</th>
            <th class="bg-primary text-light">No Telepon</th>
            <th class="bg-primary text-light">Pendaftaran</th>
            <th class="bg-primary text-light">Delete</th>
          </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr>
        <td><?=$item["nisn"];?></td>
        <td><?=$item["kode_member"];?></td>
        <td><?=$item["nama"];?></td>
        <td><?=$item["jenis_kelamin"];?></td>
        <td><?=$item["kelas"];?></td>
        <td><?=$item["jurusan"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["tgl_pendaftaran"];?></td>
        <td>
          <div class="action">
             <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data member ?');"><i class="fa-solid fa-trash"></i></a>
           </div>
        </td>
       </tr>
      <?php endforeach;?>
    </table>
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