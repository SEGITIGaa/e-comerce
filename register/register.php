
<?php
            $conn = mysqli_connect('localhost','root','','ecommerce');
            if (isset($_POST['submit'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars ( $_POST['email']);
                $password = htmlspecialchars (md5($_POST['password']));
                

                $query = "INSERT INTO user VALUE('','$username','$email','$password')";
                mysqli_query($conn,$query);

                if (mysqli_affected_rows($conn)>0) {
                    echo "berhasil";
                } else {
                    echo "gagal";
                    echo "<br>";
                    echo mysqli_error($conn);
                }
                
            }
            
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link  href="../fontawesome-free-6.2.0-web/css/all.css" rel="stylesheet" type = text/css>

</head>
<body>
        
    <nav>
        <a href="../login/login.html">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </nav>
    <div class="reg">
        <h1>Sing Up</h1>
        <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="username"  required autocomplete="off">
            <input type="email" name="email" id="email" placeholder="email" required autocomplete="off">
            <input type="password" name="password" id="password"placeholder="password" required autocomplete="off">
            <input type="password" name="cpass" id="cpass"placeholder=" confirm password" required autocomplete="off">
            <button type="submit" name="submit">confirm</button>
        </form>
    </div>
</body>
</html>