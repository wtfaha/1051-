<?php
	session_start(); 
	include("connect_db.php");
	$sql = "UPDATE login SET status = 0";
	$connect->query($sql);
	header("location:host_login.php");
	mysqli_close($connect);
?>