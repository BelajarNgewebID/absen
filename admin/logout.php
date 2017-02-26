<?php
if(isset($_POST['logout'])) {
	session_start();
	session_destroy();
	setcookie('notifLogin','Berhasil Logout',time() + 10);
	header("location: login.php");
}
?>
<style type="text/css">
	body {
		background-color: #95a5a6;
	}
	#logout-page {
		background-color: #008a96;
		color:#fff;
		width: 555px;
		text-align: center;
		font-family: sans-serif;
		border-radius: 7px;
		position: relative;
		top:159px;left: 388px;
	}
	#judul-logoutPage {
		background-color: #006e78;
		font-size: 27px;
		line-height: 65px;
		margin-bottom: 28px;
		border-top-left-radius: 7px;
		border-top-right-radius: 7px;
	}
	#tidak,#logout {
		position: relative;
		left: 30px;
		background-color: #006e78;
		color:#fff;
		font-size: 22px;
		border-radius: 5px;
		border:none;
		width: 110px;
		line-height: 39px;
		margin-bottom: 35px;
		cursor: pointer;
	}
	#logout {
		float: left;
		left: 146px;
	}
</style>
<div id="logout-page">
	<div id="judul-logoutPage">Log Out?</div>
	<form accept="logout.php" method="post"><input type="submit" id="logout" name="logout" value="Ya"></form>
	<input type="button" onclick="history.back(-1);" id="tidak" value="Tidak">
</div>