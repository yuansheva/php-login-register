<?php
session_start();
require 'authenticate.php';
if(isset($_POST['nama'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['password2'])){
    if(registrasi($_POST) > 0){
        header('Location: index.php');
    }
}

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Halaman Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Nama" name="nama" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="password2" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>