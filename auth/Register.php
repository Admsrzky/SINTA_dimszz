<?php 
    include '../layout/Config.php';
    include '../Controllers/LoginController.php';

    if (isset($_POST['regist'])) {
      if (create_account($_POST) > 0) {
        echo "<script> 
                    alert('User Berhasil ditambahkan');
                    document.location.href = 'Login.php';
                </script>";
        } else {
            echo "<script> 
                    alert('User Gagal ditambahkan');
                    document.location.href = 'Register.php';
                </script>";
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
    <!-- boxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../ index.css">
    <title>CRUD | LOGIN</title>
</head>
<body>

  <div class="Register-dark">
    <form method="post">
      <h2 class="one mb-4">Create Account</h2>
            <div class="form-group">
            <label for="">Fullname</label>
              <input class="form-control" type="text" name="fullname" placeholder="Fullname">
            </div>
            
            <div class="form-group">
              <label for="">Username</label>
              <input class="form-control" type="text" name="username" placeholder="Username">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input class="form-control" type="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit" name="regist">Register</button>
            </div>
            
            <a href="#" class="forgot">Forgot your password?</a>
            <p class="create">Have an account?<a href="Login.php"> Login Here!</a></p>
    </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>