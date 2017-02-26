<?php
include '../konfig.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');

$row = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$tanggal'"));
echo $row['id'];
?>