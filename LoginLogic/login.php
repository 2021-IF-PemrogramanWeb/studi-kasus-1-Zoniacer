<?php

$email = $_POST["email"];
$pass = $_POST["password"];

if($email == "admin@gmail.com" && $pass == "admin"){
    header('location:../pages/table.php?pesan=berhasil');
}
else{
    header("location:../pages/login.php?pesan=gagal");
}
?>