<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

    if(registrasi($_POST) > 0){
        echo "<script> 
            alert('User baru berhasil ditambahkan!');
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-color: #303030;
        }
    </style>
</head>
<body>


    <form action="" method="post" class="form">
    <h1>Halaman Registrasi</h1>
                <input type="text" class="box" name="username" id="username"  placeholder="Masukkan Username" autocomplete="off">
                <input type="password" class="box" name="password" id="password"  placeholder="Masukkan Password">
                <input type="password" class="box" name="password2" id="password2"  placeholder="Masukkan Konfirmasi Password">
                <button type="submit" name="register" id="submit">Register!</button>
                <button id="submit"><a href="login.php">Back To Form Login</a></button>
    </form>
</body>
</html>