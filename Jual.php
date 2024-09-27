<?php
session_start();
require 'function.php';

// Mengecek apakah sesi login ada
if (!isset($_SESSION["login"])) {
    header("Location: masuk.php");
    exit;
}


//cek apakah tombol submit sudah ditekan atau belum 
if( isset($_POST["submit"])) {



    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
        <script>
        alert('data berhasil diupload');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diupload');
        document.location.href = 'index.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jual akun</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="jualakun">
    <h1 class="anda">Jual akun anda</h1>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
       <ul>
          
            <p>
            <label class="idgamescuy" for="idplayer"><b>Id games :</b> </label>
            <input type="text" name="idplayer" id="idplayer" required placeholder="Masukan id game">
            </p>
            <p>
            <label class="totalskin" for="Totalskin"><b>Level skin :</b> </label>
            <input type="text" name="Totalskin" id="Totalskin" required placeholder="Masukan Level Kolektor">
            </p>
            <p>
            <label class="harga" for="Harga"><b>Harga akun :</b> </label>
            <input type="text" name="Harga" id="Harga" required placeholder="masukan harga">
            </p>
            <p>
            <label class="link" for="linkwhatsapp"><b>Link whatsapp :</b></label>
            
            <input type="text" name="linkwhatsapp" id="linkwhatsapp" pattern="https?://(www\.)?(wa\.me|api\.whatsapp\.com)/[0-9]+" placeholder="https://wa.me/6212345678" required title="Masukkan link WhatsApp yang valid">
            </p>
            <p>
            <label class="gambar" for="gambar"><b>profil akun</b> : </label>
            <input type="file" name="gambar" id="gambar">
            </p>
            
            <p >
                <button  class="tombollogin" class="pencet" type="submit" name="submit" >Tambah data</button>
            </p>
           
            <p>kembali kehalaman  <a href="index.php">utama?</a></p>
            </ul>

    </form>
    
    </div>


</body>
</html>