<?php
require 'function.php';

if (isset($_POST["register"])) {
    if( register($_POST) > 0 ) {
        echo "<script>
         alert('user baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Buat akun</title>
    <link rel="stylesheet" href="css.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body >

    <form action="" method="post">
    <div container>
    <div class="jualakun"><h1><b><u>REGISTER</u></b></h1>
    <ul class ="udanpw">
        <li>
            <label for="username" htmlspecialchars>username :</label>
            <input type="text" name="username" id="username" required>
        </li>
        <br>
        <li>
            <label for="password" htmlspecialchars>password : </label>
            <input type="password" name="password" id="password" required>
        </li>
        <br>
        <li>
            <button class="pencet" type="submit" name="register"><div class="tombollogin"> <b>Register</b></div></button>
        </li>
        </ul>
       
        </form>
        <p class="buat" style="transform: translateX(20px)translateY(-20px);">Sudah punya akun? <a href="masuk.php">Login</a></p>
   

    </div>
      
    

    </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>