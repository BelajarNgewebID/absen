<?php

include '../konfig.php';

$nis = $_GET['nis'];
$ref = $_GET['ref'];

$hapus = mysqli_query($konek, "DELETE FROM siswa WHERE nis = '$nis'");
if($hapus) {
	setcookie('kuki','Siswa berhasil dihapus',time() + 35);
	header("location: siswa.php?tampilkan=$ref");
}

?>