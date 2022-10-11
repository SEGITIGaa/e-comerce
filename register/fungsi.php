<?php 

    $conn = mysqli_connect('localhost','root','','shop');

    function registrasi($data){
       
        global $conn;

        // ambil data
        $username = strtolower( stripslashes( $data["username"] ) );
        $gmail = $data["email"];
        $password = mysqli_real_escape_string($conn,$data["password"] );
        $cpass = $data["cpass"];

        $result_nama = mysqli_query($conn,"SELECT nama FROM user WHERE nama = '$username' ") ;
        $result_gmail = mysqli_query($conn,"SELECT gmail FROM user WHERE gmail = '$gmail' ") ;

        // cek gmail dan user name tidak boleh sama
        if(mysqli_fetch_assoc($result_nama) ){
            echo "<script>
            alert('Nama Sudah ada')
            </script>";
            return false;
        }

        if(mysqli_fetch_assoc($result_gmail) ){
            echo "<script>
            alert('Gmail sudah ada')
            </script>";
            return false;
        }

        // cek password komfirmasi

        if($password !== $cpass){
            echo "<script>
        alert('Password salah')
        </script>";
        return false;   
        }

        // memasukan keu database

        $password = password_hash($password,PASSWORD_DEFAULT);

        mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$gmail','$password') ");

        return mysqli_affected_rows($conn);

    }


?>