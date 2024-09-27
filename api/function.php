<?php 


$conn = mysqli_connect("localhost", "root", "", "phpmyadmin", "3306"); 


function  register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, ($data["password"]));
   

    //cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$username'");
if (mysqli_fetch_assoc($result)) {
    echo "<script>
        alert('username yang dipilih sudah ada');
    </script>";
    return false;
}

// enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);



// tambahkan user baru kedatabases
mysqli_query($conn, "INSERT INTO akun VALUES('', '$username', '$password')");

return mysqli_affected_rows($conn);




}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}




function tambah($data) {
    global $conn;
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $idgame = htmlspecialchars($data["idplayer"]);
    $totalskin = htmlspecialchars($data["Totalskin"]);
    $harga = htmlspecialchars($data["Harga"]);
    $user_id = $_SESSION["user_id"]; // Ambil user_id dari sesi
    $linkwhatsapp = htmlspecialchars($data["linkwhatsapp"]);

     //cek idgame sudah ada atau belum
  $result = mysqli_query($conn, "SELECT Idplayer FROM database1 WHERE Idplayer = '$idgame'");
  if (mysqli_fetch_assoc($result)) {
      echo "<script>
          alert('id yang dimasukan sudah ada');
      </script>";
      return false;
  }

    $query = "INSERT INTO database1 (Gambar2, Idplayer, Totalskin, Harga, user_id, linkwhatsapp)
              VALUES ('$gambar', '$idgame', '$totalskin', '$harga', '$user_id', '$linkwhatsapp')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload() {
   
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script> 
        alert('pilih gambar terlebih dahulu');
             </script>";
             return false;
    }

    //cek apakah yang diupload hanya gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array(($ekstensiGambar), $ekstensiGambarValid)) {
        echo "<script> 
        alert('yang anda upload bukan gambar');
             </script>";
             return false;
    }

    //cek jika ukuranya terlalu besar
    if ( $ukuranfile > 1000000 ) {
        echo "<script> 
        alert('ukuran gambar terlalu besar');
             </script>";
             return false;
    }

    // lolos pengecekan, gambar siap diupload
    //generate nama file baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru.= $ekstensiGambar;

    move_uploaded_file($tmpname, 'img/' . $namafile);

    return $namafile;

}
function hapus($id) {
    global $conn;
    $user_id = $_SESSION["user_id"];
    
    // Pastikan hanya pengguna yang mengupload data yang bisa menghapusnya
    $query = "DELETE FROM database1 WHERE id = '$id' AND user_id = '$user_id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function cari($keyword) {
    $query = "SELECT * FROM database1
     WHERE 
     Idplayer LIKE '%$keyword%' OR
     Totalskin LIKE '%$keyword%' OR
     Harga LIKE '%$keyword%'
    ";
    return query($query);
}

