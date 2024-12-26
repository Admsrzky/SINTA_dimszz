<?php
session_start();
    
// cek apakah ada session username atau tidak
if (!isset($_SESSION['fullname'])) {
    $now = 'none';
    $user1 = '';
} else {
    $now = '';
    $user1 = 'Account : ' . $_SESSION['fullname'];
    $user = $_SESSION['fullname'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- DATATABLES -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
 
    <!-- DATATABLE BUTTONS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


    <!-- boxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

     <!-- Sweetsalert -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/user.css">

    <title>CRUD | HILMA </title>
  </head>
  <body>
    <!-- jumbotron -->
  <div class="mb-1 p-1 bg-dark text-white rounded text-center col-md-12 col-xs-12 col-lg-12">
    <h1 class="mt-3">SINTA</h1> 
    <p class="fs-5 text-uppercase mb-4">Sistem CRUD PHP</p> 
</div>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand fs-3" href="../index.php">Hilma<span class="text-warning">Code</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mt-1">
        <li class="nav-item"><a class="nav-link" aria-current="page" href="../index.php">Beranda</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="">About Me</a></li> -->
      </ul>
      <ul class="navbar-nav mt-1">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pilihan</a>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
        <li><a class="dropdown-item" href="Mahasiswa.php">Mahasiswa</a></li>
        <li><a class="dropdown-item" href="Dosen.php">Dosen</a></li>
        <li><a class="dropdown-item" href="TA.php">Tugas Akhir</a></li>
        <li><a class="dropdown-item" href="Buku.php">Buku</a></li>
        <li><a class="dropdown-item" href="#">Lainnya</a></li>
      </ul>
  </div>
    <!-- <a href="Logout.php" class="text-muted btn fw-bold btn-block bg-light py-2 text-center text-uppercase text-burst-hover">Logout <i class='bx bx-exit bx-xs bx-fade-right-hover'></i></a> -->
    <img src="../assets/img/hilma.png" class="user-pic" onclick="toggleMenu()">

    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
            <img src="../assets/img/hilma.png">
            <h3><?php if ($now == '') { ?><span class="text-primary"><?php echo $user ?></span>
              <?php } else { ?><p class="text-danger">Error <span>Silahkan login terlebih dahulu</span></p><?php } ?></h3>
        </div>
        <hr>

        <!-- <a href="" class="sub-menu-link">
            <img src="">
            <p>Edit Profile</p>
            <span>></span>
        </a>
        
        <a href="" class="sub-menu-link">
            <img src="">
            <p>Setting & Privacy</p>
            <span>></span>
        </a>
        
        <a href="" class="sub-menu-link">
            <img src="">
            <p>Help & Support</p>
            <span>></span>
        </a> -->
        
        <a href="../Logout.php" class="sub-menu-link" id="btn-logout">
            <img src="">
            <p>Logout</p>
            <span>></span>
        </a>

      </div>
    </div>
    

  </div>
</nav>
</div>

<script>
  let subMenu = document.getElementById('subMenu');

  function toggleMenu() {
    subMenu.classList.toggle("open-menu");
  }
</script>