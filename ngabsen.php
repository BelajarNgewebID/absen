<?php

include 'konfig.php';

$username = $_POST['username'];
$token = $_POST['token'];


date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$sql = mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$tanggal'");
$row = mysqli_fetch_array($sql);

$tokenHariIni = $row['id'];

$sql2 = mysqli_query($konek, "SELECT * FROM siswa WHERE username = '$username'");
$ada = mysqli_num_rows($sql2);
if($ada == NULL) {
	exit();
}
$row2 = mysqli_fetch_array($sql2);
$nama = $row2['nis'];
$array_siswa = $row['arraySiswa'];
if($array_siswa != NULL) {
	$arraySiswaBaru = $array_siswa.",$nama";
}else {
	$arraySiswaBaru = $nama;	
}

if($token == $tokenHariIni) {
	$ngabsen = mysqli_query($konek, "UPDATE absensi SET arraySiswa = '$arraySiswaBaru' WHERE id = '$tokenHariIni'");
	if($ngabsen) {
		setcookie('notif','Berhasil Masuk',time() + 14);
	}else {
		setcookie('notif','Gagal. Kueri salah', time() + 14);
	}
}else {
	setcookie('notif','Token yang Anda masukkan salah...',time() + 14);
}

?>