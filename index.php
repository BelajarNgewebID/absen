<?php

include 'konfig.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');

$sql = mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$tanggal'");
$row = mysqli_fetch_array($sql);

$token = $row['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Absensi Online</title>
	<link href="inc/style.index.css" rel="stylesheet">
	<script type="text/javascript" src="inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="inc/script.index.js"></script>
	<script type="text/javascript">
		$("document").ready(function() {
			$("#tblMasuk").click(function() {
				var username = $("#username").val();
				var token = $("#token").val();
				var dataString = 'username='+username+'&token='+token;
				if(username == 'Masukkan Username...' || username == '') {
					$("#username").css({"background-color":"#e74c3c"});
					return false;
				}
				if(token == 'Masukkan Token hari ini...' || token == '' || token != <?php echo $token; ?>) {
					$("#token").css({"background-color":"#e74c3c"});
					return false;
				}
				$.ajax({
					type: "POST",
					url: "ngabsen.php",
					data: dataString,
					success: function(html) {
						$(".bg,.notif").fadeIn(300);
					}
				});
			});
		});
	</script>
</head>
<body>

<div class="atas">
	<div class="judul">Absensi Online</div>
</div>

<div class="pertamaIndex">
	<div class="isiIndex">
		<div id="isiUsername">Masukkan Username...</div>
		<input type="text" name="username" class="boxAbsen" id="username"><br />
		<div id="isiToken">Masukkan Token hari ini...</div>
		<input type="text" name="token" class="boxAbsen" id="token"><br />
		<button id="tblMasuk">MASUK</button><br />
		<div class="bawah">
		Tidak Masuk? <a href="#" id="tblKirimSurat">Kirim Surat</a> keterangan!
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="notif" >
	<div class="isiNotif">Berhasil Masuk!</div><div id="xNotif">X</div>
</div>
<div id="formKirimSurat">
	<h2>Kirim Surat</h2>
	<form action="kirim_surat.php" method="post" enctype="multipart/form-data">
	<div id="isiUsername2">Masukkan Username...</div>
	<input type="text" name="username" id="usernameSurat" class="boxSurat"><br />
	<select name="alasan" class="alasan" id="alasan">
		<option value="kosong">Pilih Alasan...</option>
		<option value="S">Sakit</option><option value="I">Ijin</option>
	</select>
	<div class="lampiran">
	<div id="bungLamp1">
	Lampiran 1 : <input type="file" name="lampiran1" id="lampiran1">
	</div>
	<div id="bungLamp2">
	Lampiran 2 : <input type="file" name="lampiran2" id="lampiran2">
	</div>
	</div>
	<div class="ket">
	Keterangan :<br />
	<li>Lampiran 1 : Scan Surat Ijin</li>
	<li>Lampiran 2 : Foto orang tua memegang surat</li>
	<li>Format lampiran harus PNG/JPG/JPEG</li>
	</div>
	<input type="submit" name="kirim_surat" class="tblKirimSurat" value="KIRIM">
	</form>
</div>

<?php
$awaljs = '<script type="text/javascript">$("document").ready(function() {';
$akirjs = '});</script>';
$kuki = $_COOKIE['kuki'];
if($kuki == 'Berhasil mengirim surat') {
	echo $awaljs.'$(".bg,.notif").fadeIn(300);$(".isiNotif").html("Berhasil mengirim surat");'.$akirjs;
}elseif($kuki == 'Username salah!') {
	echo $awaljs.
		'$(".bg,.notif").fadeIn(300);$(".notif").css({"background-color":"#e74c3c"});$(".isiNotif").html("Username salah!");'
	.$akirjs;
}elseif($kuki == 'Format gambar tidak diperbolehkan') {
	echo $awaljs.
	'$(".bg,.notif").fadeIn(300);$(".notif").css({"background-color":"#e74c3c"});$(".isiNotif").html("Format gambar tidak diperbolehkan");'
	.$akirjs;
}
?>

</body>
</html>