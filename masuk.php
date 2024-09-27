<?php
session_start();


if( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

   $result =  mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");


    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Set session variables
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["id"]; // Asumsi kolom id di tabel akun adalah user_id
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body >
   
    <form action="" method="post">
    <div container>
    <div class="jualakun"><h1><b><u>LOGIN</u></b></h1>
    <?php
    if( isset($error)) : ?>
        <p style="color : red;">username/password salah</p>
    <?php endif; ?>
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
           <button class="pencet" type="submit" name="login"><div class="tombollogin"> <b>Masuk</b></div></button>
        </li>
        </ul>
        
        </form>
        <p style="transform: translateX(20px)translateY(-20px);">Belum punya akun? <a href="buatakun.php">Register</a></p>
        
        <div class="desain"></div>
    </div>
      
       

    </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>