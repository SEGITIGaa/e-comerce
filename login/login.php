<?php 
    // connect data base
    $conn = mysqli_connect("localhost","root","","shop");
    

    // Cek gmail dan password
    if(isset ($_POST["login"]) ){

        $gmail_user = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn," SELECT * FROM user WHERE gmail = '$gmail_user' ");

        if( mysqli_num_rows($result) === 1 ){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password,$row["password"]) ){
                header("Location: index.php");
                exit();
            }

        }

        $error = true;
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav>
        <img src="../img/logo-title.png" alt="">
    </nav>
    <div class="login">
    <form action="" method="POST">
        <h1>Login</h1>
        <input type="email" name="email" id="email" placeholder="email" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="password"  autocomplete="off">
        
        <!-- pengingatan ini akan muncul jika password salah  -->
        <?php if(isset($error) ) : ?>
            <p class="perigatan" style="color: red;">Password / Username salah</p>
        <?php endif; ?>

        <button type="submit" name="login" value="Login">Login</a></button>
    </form>

    <h4>Belum punya akun? <a href="../register/register.php" target="_self"> Sing Up</a></h4>

    </div>
</body>
</html>