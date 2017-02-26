<?php
include '../konfig.php';

session_start();
$sesi = $_SESSION['sesiAdminAbsen'];
if(empty($sesi)) {
	header("location: login.php");
}
$skrg = date('Y-m-d');
$sql = mysqli_query($konek, "SELECT * FROM absensi WHERE tanggal = '$skrg'");
$row = mysqli_fetch_array($sql);
$token = $row['id'];
if($token == NULL) {
	$token = "KOSONG";
	$generate = "<form><input type='hidden' id='tes' value='ya' /><input type='button' id='generateToken' value='Buat Token' /></form>";
}else {
	$generate = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Token | Absensi Online</title>
	<script type="text/javascript" src="../inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../inc/script.admin.js"></script>
	<link href="../inc/style.admin.css" rel="stylesheet">
</head>
<body>

<div class="bodyAdmin"></div>

<div class="atasAdmin">
	<div class="judul">Token Login</div>
</div>

<div class="isiToken">
	<h1>Token hari ini : <span id="tokenku"><?php echo $token; ?></span></h1>
	<?php echo $generate; ?>
</body>
</html>