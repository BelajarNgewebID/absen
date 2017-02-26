<?php

include 'konfig.php';

date_default_timezone_set('Asia/Jakarta');

$idsurat = rand(11111,99999);
$username = $_POST['username'];
$alasan = $_POST['alasan'];
$lampiran1 = $_FILES['lampiran1']['name'];
$lampiran2 = $_FILES['lampiran2']['name'];
$tmp_lmprn1 = $_FILES['lampiran1']['tmp_name'];
$tmp_lmprn2 = $_FILES['lampiran2']['tmp_name'];
$tanggal = date('Y-m-d H:i:s');

$pecah1 = explode(".", $lampiran1);
$tot = count($pecah1);
$format = $pecah1[$tot-1];

$pecah2 = explode(".", $lampiran2);
$tot2 = count($pecah2);
$format2 = $pecah2[$tot-1];

$boleh = "png,jpg,jpeg";
$pchBoleh = explode(",", $boleh);

$sql = mysqli_query($konek, "SELECT * FROM siswa WHERE username = '$username'");
$ada = mysqli_num_rows($sql);
if($ada != NULL) {
	// ada
	if(in_array($format, $pchBoleh)) {
		if(in_array($format2, $pchBoleh)) {
			$kirim = mysqli_query($konek, "INSERT INTO surat VALUES('$idsurat','$username','$alasan','$lampiran1','$lampiran2','$tanggal')");
			$upload = move_uploaded_file($tmp_lmprn1, "surat/$username.".$lampiran1);
			if($upload) {
				$lagi = move_uploaded_file($tmp_lmprn2, "surat/$username.".$lampiran2);
				if($lagi) {
					setcookie('kuki','Berhasil mengirim surat',time() + 73);
					header("location: index.php");
				}
			}
		}else {
			setcookie('kuki','Format gambar tidak diperbolehkan',time() + 69);
			header("location: index.php");
		}
	}else {
		setcookie('kuki','Format gambar tidak diperbolehkan',time() + 69);
		header("location: index.php");
	}
}else {
	setcookie('kuki','Username salah!',time() + 69);
	header("location: index.php");
}

?>