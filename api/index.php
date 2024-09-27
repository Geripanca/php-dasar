<?php
session_start();
require 'function.php';

// Mengecek apakah sesi login ada
if (!isset($_SESSION["login"])) {
    header("Location: masuk.php");
    exit;


}

// Mengambil data dari database
$database1 = query("SELECT * FROM database1");

    //tombol cari ditekan
    if ( isset($_POST["cari"])) {
        $database1 = cari($_POST["keyword"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JualBeliAcount</title>
    <link rel="stylesheet" href="css2.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand page-scroll">  

<form class="pencarian" action="" method="post">
<input type="text" name="keyword" size="18" autocomplete="off">
<button class="tombolcari" type="submit" name="cari"><div class="cari"></div></button>
</form></div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Jual.php" class="page-scroll">Jual account</a></li>
                    <li><a href="https://wa.me/qr/NRLTCKQSAC5UP1" class="page-scroll">Contact</a></li>
                    <li><a href="logout.php" class="page-scroll">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
  
    <!-- Akhir Navbar -->

  
    <br><br>
    <?php foreach ($database1 as $row) : ?>
    <div class="kotakpenjualan">
      
        <p><img src="img/<?php echo htmlspecialchars($row['Gambar2']); ?>" width="400" height="200" alt="Gambar"></b></p>
        <p class="offset"><b>Id Game : <?php echo htmlspecialchars($row['Idplayer']); ?></b></p>
        <p class="offset"><b>Level Kolektor : <?php echo htmlspecialchars($row['Totalskin']); ?></b></p>
        <p class="offset"><b>Harga : Rp.<?php echo htmlspecialchars($row['Harga']); ?></b></p>
        <div class="deskripsiakun">
        <div class="beli">
        <?php
          echo '<a href="' . htmlspecialchars($row['linkwhatsapp'], ENT_QUOTES, 'UTF-8') . '">Beli akun</a>';
        ?>
        </div>


        <form class="hapus" action="hapus.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="hapus">Hapus</button>
        </form>
    </form>
            
    </div>
    <div class="logo"></div>
    </div>
    
    <?php endforeach; ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
</body>
</html>
