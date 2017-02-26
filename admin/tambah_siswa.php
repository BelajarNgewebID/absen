<?php

include '../konfig.php';

$total = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM siswa WHERE 1"));

$nis = $total+1;
$nama = $_POST['nama'];
$username = $_POST['username'];
$kelas = $_POST['kelas'];

$masukkan = mysqli_query($konek, "INSERT INTO siswa VALUES('$nis','$nama','$username','0','0','0','0','$kelas')");
if($masukkan) {
	setcookie('kuki','Berhasil menambahkan siswa',time() + 58);
	header("location: siswa.php?tampilkan=semua");
}

?>