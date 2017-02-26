<?php

session_start();
$sesi = $_SESSION['sesiAdminAbsen'];
if(empty($sesi)) {
	header("location: login.php");
}

include '../konfig.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Siswa</title>
	<link href="../inc/style.admin.css" rel="stylesheet">
	<script type="text/javascript" src="../inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../inc/script.admin.js"></script>
</head>
<body>

<div class="bodyAdmin"></div>

<?php
$tampilkan = $_GET['tampilkan'];
if(empty($tampilkan)) {
?>
<div class="atasAdmin">
	<div class="judul">Tampilkan Siswa</div>
	<div id="backIndex"><</div>
</div>

<div class="isiSiswa">
	<h2>Tampilkan Siswa Berdasarkan :</h2>
	<li><a href="siswa.php?tampilkan=semua">Semua</a></li>
	<li><a href="siswa.php?tampilkan=hadir+sekarang">Hadir Sekarang</a></li>
	<li><a href="siswa.php?tampilkan=kelas">Kelas</a></li>
	<li><a href="siswa.php?tampilkan=tidak+masuk">Tidak Masuk</a></li>
</div>

<?php
}elseif($tampilkan == "semua") {
	include 'semua_siswa.php';
}elseif($tampilkan == "hadir sekarang") {
	include 'hadir_sekarang.php';
}elseif($tampilkan == "tidak masuk") {
	include 'tidak_masuk.php';
}elseif($tampilkan == "kelas") {
	include 'kelas.php';
}

$awaljs = '<script type="text/javascript">$("document").ready(function() {';
$akirjs = '});</script>';
$kuki = $_COOKIE['kuki'];
if($kuki != NULL) {
	echo $awaljs.
	'$(".bg,.notif").fadeIn(310);
	$("#isiNotif").html("'.$kuki.'");'
	.$akirjs;
}
?>

<div class="bg"></div>
<div class="notif" style="display:block;top:69%">
<div id="isiNotif"></div>
</div>

</div>
</body>
</html>