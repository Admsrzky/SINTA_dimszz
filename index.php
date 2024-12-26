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

    include './layout/Config.php';

    $jumlah_mahasiswa = mysqli_num_rows(mysqli_query($db, "SELECT * FROM mahasiswa"));
    $jumlah_dosen = mysqli_num_rows(mysqli_query($db, "SELECT * FROM dosen"));
    $jumlah_ta = mysqli_num_rows(mysqli_query($db, "SELECT * FROM ta"));
    $jumlah_buku = mysqli_num_rows(mysqli_query($db, "SELECT * FROM buku"));
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- datatables -->
    <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>

    <!-- boxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/user.css">

    <title>CRUD | HILMA </title>
  </head>
  <body>
    <!-- jumbotron -->
  <div class="mb-1 p-5 bg-dark text-white rounded text-center col-md-12 col-xs-12 col-lg-12">
    <h1>SINTA</h1> 
    <p class="fs-5 text-uppercase">Sistem Crud PHP</p>
</div>

<div class="container text-center text-uppercase" style="margin-top:80px">
    <div class="row">
        <h1> <?php if ($now == '') { ?>SELAMAT DATANG <span class="text-primary"><?php echo $user ?></span> <br> SISTEM CRUD PHP
             <?php } else { ?> SELAMAT DATANG <br>SISTEM CRUD PHP <?php } ?></h1>
        
        <!-- Card Mahasiswa -->
        <div class="col-sm-4 mb-sm-0">
            <div class="card mt-4">
                <div class="card-header text-uppercase fw-bold">Mahasiswa</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_mahasiswa ?>
                    </p>
                    <a href="<?php echo isset($_SESSION['fullname']) ? 'views/mahasiswa.php' : '#' ?>" 
                       class="btn btn-primary" 
                       onclick="checkLogin(<?php echo isset($_SESSION['fullname']) ? 'true' : 'false' ?>)">Selengkapnya 
                       <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Card Dosen -->
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card mt-4">
                <div class="card-header text-uppercase fw-bold">Dosen</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_dosen ?>
                    </p>
                    <a href="<?php echo isset($_SESSION['fullname']) ? 'views/dosen.php' : '#' ?>" 
                       class="btn btn-primary" 
                       onclick="checkLogin(<?php echo isset($_SESSION['fullname']) ? 'true' : 'false' ?>)">Selengkapnya 
                       <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Card Tugas Akhir -->
        <div class="col-sm-4 mb-3">
            <div class="card mt-4">
                <div class="card-header text-uppercase fw-bold">Tugas Akhir</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_ta ?>
                    </p>
                    <a href="<?php echo isset($_SESSION['fullname']) ? './views/TA.php' : '#' ?>" 
                       class="btn btn-primary" 
                       onclick="checkLogin(<?php echo isset($_SESSION['fullname']) ? 'true' : 'false' ?>)">Selengkapnya 
                       <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Card Buku -->
        <div class="col-sm-4 mb-3">
            <div class="card mt-4">
                <div class="card-header text-uppercase fw-bold">Buku</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bx-book bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_buku ?>
                    </p>
                    <a href="<?php echo isset($_SESSION['fullname']) ? './views/Buku.php' : '#' ?>" 
                       class="btn btn-primary" 
                       onclick="checkLogin(<?php echo isset($_SESSION['fullname']) ? 'true' : 'false' ?>)">Selengkapnya 
                       <i data-feather="chevrons-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkLogin(isLoggedIn) {
        if (!isLoggedIn) {
            Swal.fire({
                icon: 'warning',
                title: 'Belum Login',
                text: 'Silakan login terlebih dahulu untuk melanjutkan.',
                confirmButtonText: 'Login'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './auth/Login.php';
                }
            });
        }
    }
</script>

<?php include("layout/footer.php"); ?>
