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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register | Modern Design</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: radial-gradient(circle at 50% -20.71%, #ffffdb 0, #ffffd4 8.33%, #ffffce 16.67%, #f7fec7 25%, #e9fbc1 33.33%, #daf7bb 41.67%, #c9f2b5 50%, #b7edb1 58.33%, #a4e9af 66.67%, #91e5af 75%, #7ce2b1 83.33%, #66dfb4 91.67%, #4cdcb9 100%);
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-card {
          background-image: linear-gradient(180deg, #cdc3ff 0, #9d9df2 50%, #7278b7 100%);
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-card h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #343a40;
            text-align: center;
        }
        .form-group label {
            font-weight: 500;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .forgot, .create {
            text-align: center;
            margin-top: 10px;
        }
        .forgot a, .create a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot a:hover, .create a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <h2>Create Account</h2>
            <form method="post">
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input class="form-control" type="text" name="fullname" placeholder="Fullname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit" name="regist">Register</button>
                <!-- <p class="forgot"><a href="#">Forgot your password?</a></p> -->
                <p class="create mt-5">Have an account? <a href="Login.php">Login Here!</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
