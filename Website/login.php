<?php

session_start();
if(isset($_SESSION["login"])){
    header("Location:Admin");
    exit;
}

require 'koneksi/functions.php';

 
    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username'");

        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row["password"]))
            {
                $_SESSION["login"]=true;
                header("Location:Admin");
                exit;
            }
            
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="icon" href="../pictures/PET.png" type="image/jpg" />
  </head>
  <body>
    <section>
      <div class="form-box">
        <div class="form-value">
        <form action="" method="post">
            <center><img src="../pictures/logo.png" style="width: 250px" /></center>
            <div>
            <?php if(isset($error)) : ?>
                        <p style="color:red;position: relative;margin: 30px 0;width: 310px;">Username / Password salah</p>
                    <?php endif; ?>
            </div>
            <div class="inputbox">
              <ion-icon name="person-outline"></ion-icon>
              <input type="text" name = "username" required placeholder="Username" />
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input type="password" name="password" required placeholder="Password" />
            </div>
            <button name="login">Log in</button>
            <center><a href="verifikasi_email.php" style="color:white;">Lupa Password?</a></center>
          </form>
        </div>
      </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
