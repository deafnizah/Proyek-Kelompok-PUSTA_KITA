<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../sign/admin/sign_in.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Admin Dashboard</title>
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
          <img src="../assets/logoNavPustaKita.png" alt="logo" width="120px">
        </a>
  
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/adminLogo.png" alt="adminLogo" width="40px">
          </button>
        <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
          <li>
            <a class="dropdown-item text-center" href="#">
            <img src="../assets/adminLogo.png" alt="adminLogo" width="30px">
            </a>
          </li>
          <li>
            <a class="dropdown-item text-center text-secondary" href="#"> <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></a>
            </span>
          </li>
          <hr>
          <li>
            <a class="dropdown-item text-center mb-2" href="#">Akun Terverifikasi <span class="text-primary"><i class="fa-solid fa-circle-check"></i></span></a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Sign Out <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="mt-5 p-4">
      <?php
      // Mendapatkan tanggal dan waktu saat ini
      $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
      // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
      $day = date('l');
      // Mendapatkan tanggal dalam format 1 hingga 31
      $dayOfMonth = date('d');
      // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
      $month = date('F');
      // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
      $year = date('Y');
      ?>

      <h1 class="mt-5 fw-bold">Dashboard - <span class="fs-4 text-secondary"> <?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?> </span></h1>
    
      <div class="alert alert-success" role="alert">Selamat datang admin - <span class="fw-bold text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></span> di Dashboard PustaKita</div>
      
      <div class="mt-4 p-3">

        <!-- <div class="row gap-2">
        <div class="col bg-info p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="member/member.php">Member</a>
        </div>
        <div class="col bg-success p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="buku/daftarBuku.php">Buku</a>
        </div>
        </div>
        <div class="row gap-2 mt-2">
        <div class="col bg-warning p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="peminjaman/peminjamanBuku.php">Peminjaman</a>
        </div>
        <div class="col bg-dark p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="pengembalian/pengembalianBuku.php">Pengembalian</a>
        </div>
        </div>
        <div class="row mt-2">
        <div class="col bg-danger p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="denda/daftarDenda.php">Denda</a>
        </div>
        </div> -->

        <div class="d-flex flex-wrap justify-content-center gap-2">
        <div class="cardImg">
          <a href="member/member.php">
            <img src="../assets/dashboardCardMember/member.png" alt="daftar buku" style="max-width: 100%;" width="600px">
          </a>
        </div>
        <div class="cardImg">
          <a href="buku/daftarBuku.php">
          <img src="../assets/dashboardCardMember/bukuAdmin.png" alt="daftar buku" style="max-width: 100%;" width="600px">
          </a>
        </div>

        <div class="cardImg">
          <a href="peminjaman/peminjamanBuku.php">
            <img src="../assets/dashboardCardMember/peminjaman.png" alt="daftar buku" style="max-width: 100%;" width="600px">
          </a>
        </div>
        <div class="cardImg">
          <a href="pengembalian/pengembalianBuku.php">
          <img src="../assets/dashboardCardMember/pengembalianAdmin.png" alt="daftar buku" style="max-width: 100%;" width="600px">
          </a>
        </div>
      
         <div class="cardImg">
           <a href="denda/daftarDenda.php">
           <img src="../assets/dashboardCardMember/denda.png" alt="daftar buku" style="max-width: 100%;" width="600px">
           </a>
         </div>
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