<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";

if(isset($_POST["bayar"]) ) {
  
  if(bayarDenda($_POST) > 0) {
    echo "<script>
    alert('Denda berhasil dibayar');
    document.location.href = 'TransaksiDenda.php';
    </script>";
  }else {
    echo "<script>
    alert('Denda gagal dibayar');
    </script>";
  }
  
}

$dendaSiswa = $_GET["id"];
$query = queryReadData("SELECT pengembalian.id_pengembalian, buku.judul, member.nama, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
WHERE pengembalian.id_pengembalian = $dendaSiswa");

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Form Bayar Denda || Member</title>
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
        
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
    </nav>
    
  <div class="p-4 mt-5">
    <div class="mt-5 card p-3 mb-5">
    <form action="" method="post">
    <h3>Form bayar denda</h3>
      <?php foreach ($query as $item) : ?>
      <input type="hidden" name="id_pengembalian" id="id_pengembalian" value="<?= $item["id_pengembalian"]; ?>">
      
      <div class="mt-4 mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" class="form-control" placeholder="Nama siswa" name="nama" id="nama" value="<?= $item["nama"]; ?>" readonly>
          </div>
      
      <div class="d-flex flex-wrap gap-4">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Buku yang dipinjam</label>
          <input type="text" class="form-control" placeholder="Judul Buku" name="judul" id="judul" value="<?= $item["judul"]; ?>" readonly>
          </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Tanggal dikembalikan</label>
          <input type="date" class="form-control" name="buku_kembali" id="buku_kembali" value="<?= $item["buku_kembali"]; ?>" readonly>
          </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Besar Denda</label>
          <input type="number" class="form-control" name="denda" id="denda" value="<?= $item["denda"]; ?>" readonly>
          </div>
      </div>
      <?php endforeach; ?>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Jumlah Denda yang dibayar</label>
          <input type="number" class="form-control" name="bayarDenda" id="bayarDenda" required>
      </div>
          
      <button type="reset" class="btn btn-warning text-light">Reset</button>
      <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
    </form>
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