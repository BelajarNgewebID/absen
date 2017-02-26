<?php

$host = "localhost";
$user = "root";
$pass = "";
$nama = "absen";

$konek = mysqli_connect($host,$user,$pass,$nama);
if(!$konek) {
	die('Gagal terhubung ke Database');
}

?>