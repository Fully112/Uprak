<?php 
require 'functions.php';
$id = $_GET['id'];
$dm = query("SELECT * FROM makanan WHERE id = $id")[0]; 

if( isset($_POST["submit"]) ) {

    if(ubah($_POST) > 0) {
        echo 
        "<script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script> ";
    } else {
        echo 
        "<script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
        </script> ";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor=#303030>

    <form action="" method="post" class="form">
    <h1>Ubah Data Menu</h1>
    <input type="hidden" name="id" value="<?= $dm["id"]; ?>">
 
            <input type="text" class="semua" name="nama" id="nama" value="<?= $dm["nama"] ?>">

            <input type="text" class="semua" name="stok" id="stok" value="<?= $dm["stok"] ?>">
 
            <input type="text" class="semua" name="kategori" id="kategori" value="<?= $dm["kategori"] ?>">

            <input type="text" class="semua" name="deskripsi" id="deskripsi" value="<?= $dm["deskripsi"] ?>">
        
            <input type="text" class="semua" name="harga" id="harga" value="<?= $dm["harga"] ?>">

            <button type="submit" name="submit" id="submit">Ubah Data!</button>
 


    </form>
    
</body>
</html>