<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Login Admin</title>
	<link href="../inc/style.admin.css" rel="stylesheet">
	<script type="text/javascript" src="../inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../inc/script.admin.js"></script>
</head>
<body>

<div class="boxLogin">
	<h1>Login Admin</h1>
	<div id="isiUsername">Masukkan Username...</div>
	<input type="text" name="username" class="loginBox" id="username"><br />
	<div id="isiPassword">Masukkan Password...</div>
	<input type="password" name="password" class="loginBox" id="password"><br />
	<button id="tblLogin">MASUK</button>
</div>

<?php
$awaljs = '<script type="text/javascript">$("document").ready(function() {';
$akirjs = '});</script>';
$kukiLogin = $_COOKIE['kukiLogin'];
if($kukiLogin != NULL) {
	echo $awaljs.'$(".notif").css({"background-color":"#e74c3c"});
	$(".notif").html("'.$kukiLogin.'");
	$(".bg,.notif").fadeIn(400);'.$akirjs;
}
?>

<div class="bg"></div>
<div class="notif">
<div id="isiNotif">Sedang Login...</div>
</div>

</body>
</html>