<?php
	$servername = "localhost";
	$db_username = "root";		//資料庫連線帳號
	$db_password = "";		//資料庫連線密碼
	$databasename = "relax";
	$connect = new mysqli($servername, $db_username, $db_password, $databasename);
	if($connect->connect_error) die("Connection failed: " . $connect->connect_error);
	mysqli_set_charset($connect,"utf8");	//設定編碼
?>