<?php 
require 'functions.php';
if( isset($_POST["submit"]) ) {

    if(tambah($_POST) > 0) {
        echo 
        "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script> ";
    } else {
        echo 
        "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script> ";
}
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="#303030">

    <form action="" method="post" class="form">
    <h1>Tambah Data Menu</h1>
            <input type="text" name="nama" id="nama" class="semua" placeholder="Masukkan Nama Makanan..." autocomplete="off" required>
            <input type="text" name="stok" id="stok" class="semua" placeholder="Masukkan Sisa Stok..." autocomplete="off">
            <input type="text" name="kategori" id="kategori" class="semua" placeholder="Masukkan Kategori..." autocomplete="off">  
            <input type="text" name="deskripsi" id="deskripsi" class="semua" placeholder="Masukkan Deskripsi..." autocomplete="off">
            <input type="text" name="harga" id="harga" class="semua" placeholder="Masukkan Harga..." autocomplete="off">            
            <button type="submit" name="submit" id="submit">Tambah Data!</button>
            <button class="semua"><a href="index.php">Back To Index</a></button>
        


    </form>
    
</body>
</html>