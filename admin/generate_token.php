<?php
include '../konfig.php';
include 'sesi_admin.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');

$tes = $_POST['tes'];
$id = rand(111111,999999);


$cek = mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$tanggal'");
$ada = mysqli_num_rows($cek);
if($ada == NULL) {
	$buat = mysqli_query($konek, "INSERT INTO absensi VALUES ('$id','$tanggal','')");
	if($buat) {
		setcookie('notif','Berhasil membuat token',time() + 13);
	}
}
?>