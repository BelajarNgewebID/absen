<div class="atasAdmin">
	<div class="judul">Sudah Hadir</div>
</div>
<div id="hadirSekarang">
<?php
error_reporting(1);
$batas = $_GET['batas'];
if(empty($batas)) {
	$batas = 2222;
	$posisi = 0;
}else {
	$posisi = ($halaman-1) * $batas;
}
$halaman = $_GET['laman'];
if(empty($halaman)) {
	$halaman = 0;
}
date_default_timezone_set('Asia/Jakarta');
$skrg = date('Y-m-d');

$sql = mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$skrg'");
$row = mysqli_fetch_array($sql);
$array_siswa = $row['arraySiswa'];

$pecah = explode(",", $array_siswa);
$tot = count($pecah);
if($tot > $batas) {
	$tot = $batas;
}
$next = $halaman+1;
?>
<center><table class="tabelHadir">
<tr><th id="th1">NIS</th><th id="th2">Nama</th><th id="th3">Username</th><th id="th5">Kelas</th></tr>
<?php
for ($i=$halaman-1; $i < $tot; $i++) {
	$nama = $pecah[$i];
	$sql2 = mysqli_query($konek, "SELECT * FROM siswa WHERE nis = '$nama'");
	$row2 = mysqli_fetch_array($sql2);
	echo "<tr><td id='td1'>{$row2['nis']}</td>".
		 "<td id='td2'>{$row2['nama']}</td>".
		 "<td id='td3'>{$row2['username']}</td>".
		 "<td id='td4'>{$row2['kelas']}</td></tr>";
}
?>
</table>
</center>
</div>