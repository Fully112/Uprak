<?php 
require 'functions.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
       if( password_verify($password, $row["password"]) ){
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background: url('bg.jpeg') no-repeat center center/cover
        }
    </style>
</head>
<body>


    <form action="" method="post" class="form">
<?php if(isset($error)) : ?>
<p>Username dan Password Salah</p>
<?php endif;?>
    <h1>Halaman Login</h1>
                <input type="text" class="box" name="username" id="username"  placeholder="Masukkan Username">
                <input type="password" class="box" name="password" id="password"  placeholder="Masukkan Password">

                <button type="submit" name="login" id="submit">Login</button>
                <button id="submit"><a href="registrasi.php">Register</a></button>
    </form>
</body>
</html>