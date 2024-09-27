<?php
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: masuk.php");
    exit;
}

if (isset($_POST["hapus"])) {
    $id = $_POST["id"];
    if (hapus($id) > 0) {
        echo "<script>
            alert('Postingan berhasil dihapus');
            document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Anda bukan pemilik postingan !!');
            document.location.href = 'index.php';
            </script>";
    }
}
?>