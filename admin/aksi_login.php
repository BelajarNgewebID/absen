<?php

include '../konfig.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($konek, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$login = mysqli_num_rows($sql);
if($login != NULL) {
	session_start();
	$_SESSION['sesiAdminAbsen']=$username;
	header("location: index.php");
}else {
	setcookie('kukiLogin','Username / Password Salah!',time() + 29);
}

?>