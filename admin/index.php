<?php

error_reporting(1);
session_start();
$sesi = $_SESSION['sesiAdminAbsen'];
if(empty($sesi)) {
	include 'login.php';
}else {
	include 'dasbor.php';
}

?>