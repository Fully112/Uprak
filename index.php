<?php 
require 'functions.php';
$makanan = query("SELECT * FROM makanan");

if(isset($_POST["cari"])) {
  $makanan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Index</title>
</head>
<style>
  body{
    background-color: #303030;
  }
  th{
    color: white;
  }
  td{
    color: white;
  }
  h1{
    color: white;
  }
  ul{
    background-color: black;
    margin-left: -10px;
    margin-right: -10px;
    margin-top: -6px;
    margin-bottom: 20px;
    padding-top: 15px;
    padding-bottom: 15px;
  }
  ul li{
    display: inline-block;
  }
  ul li a{
    font-size: 30px;
    margin-left: 10px;
  }
  a{
    color: white;
    text-decoration: none;
  }

td a{
    border: 1px solid #007bff;
    background: #007bff;
    padding: 5px;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
td a:hover {
    background: white;
    color: #007bff;
}

 
</style>
<body>
 <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="tambah.php">Tambah Data</a></li>
  <li><a href="logout.php">LogOut</a></li>
 </ul>

 <form action="" method="post">

    <input type="text" name="keyword" size="30" placeholder="Masukkan Keyword Pencarian..." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

 </form>


<center><h1>Daftar Menu</h1></center>

<table border="1" cellpadding="10" cellspacing="0" bordercolor=""> 

<tr>
  <th>No</th>
  <th>Nama Makanan</th>
  <th>Stok</th>
  <th>Kategori</th>
  <th>Deskripsi</th>
  <th>Harga</th>
  <th>Action</th>
</tr>

<?php $i = 1; ?>
<?php foreach($makanan as $row) : ?>
<tr> 
  <td><?= $i; ?></td>
  <td><?= $row["nama"]; ?></td>
  <td><?= $row["stok"]; ?></td>
  <td><?= $row["kategori"]; ?></td>
  <td><?= $row["deskripsi"]; ?></td>
  <td><?= $row["harga"]; ?></td>
  <td> 
     <a href="ubah.php?id=<?= $row["id"]; ?>" >Edit</a> |
     <a href="hapus.php?id=<?= $row["id"]; ?>"class="action" onclick="return confirm('Apakah anda ingin menghapusnya?')">Hapus</a>
  </td>
</tr>
<?php $i++ ?>
<?php endforeach; ?>
</table>


</body>
</html>