<?php 
$conn = mysqli_connect("localhost","root","","latihanuprakxi");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nama = $data["nama"];
    $stok = $data["stok"];
    $kategori = $data["kategori"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];

    $query = "INSERT INTO makanan VALUES
                ('','$nama','$stok','$kategori','$deskripsi','$harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM makanan WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $stok = $data["stok"];
    $kategori = $data["kategori"];
    $deskripsi = $data["deskripsi"];
    $harga = $data["harga"];

    $query = "UPDATE makanan SET 
                nama = '$nama',
                stok = '$stok',
                kategori = '$kategori',
                deskripsi = '$deskripsi',
                harga = '$harga'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM makanan 
                WHERE 
                nama LIKE '%$keyword%' OR
                stok LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                deskripsi LIKE '%$keyword%' OR
                harga LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // Cek Username Sudah Ada Atau Belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('Username Sudah Terdaftar!');
             </script>";
        return false;
    }

    // Cek Konfirmasi Password

    if( $password !== $password2){
        echo "<script>
                alert('Konfirmasi Password Tidak Sesuai!');
             </script>";
             return false;
    }
    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan User Baru
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}
?>