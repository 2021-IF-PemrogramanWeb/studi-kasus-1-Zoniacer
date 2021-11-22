<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'studi-kasus';

$db_connection = mysqli_connect($server, $user, $password, $database);

if(!$db_connection){
 die('Gagal Terhubung(Lost Connect): '.mysqli_connect_error() );
}else{
 //print('Berhasil terkoneksi dengan database. Silahkan memilih menu yang disediakan.');
}

?>