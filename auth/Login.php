<?php
   session_start();

   if(isset($_SESSION['fullname'])) {
    header('location: ../index.php');
    exit();
   }

   include '../layout/Config.php';

   if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password']; 

    // Query cek user apakah sudah terdaftar atau belum
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $sql);

    // kondisi jika user sudah terdaftar dan belum
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fullname'] = $row['fullname'];
          echo "<script> alert('Berhasil Login');
                document.location.href = '../index.php';</script>";
                exit();
  } else {
          echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!'); 
                document.location.href = 'Login.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Sweetsalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- boxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../index.css">
    <title>CRUD | LOGIN</title>
</head>
<body>

  <div class="login-dark">
    <form method="post">
      <h2 class="one text-uppercase">Login</h2>
            <div class="form-group">
            <label for="">Email</label>
              <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            
            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
            </div>
            
            <a href="#" class="forgot">Forgot your email or password?</a>
            <p class="create">Don't have an account?<a href="./Register.php"> Register Here!</a></p>
    </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>