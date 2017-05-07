<?php  
	include "connect_db.php";
	mysqli_query($connect, 'SET CHARACTER SET utf8');	// 送出Big5編碼的MySQL指令
	mysqli_query($connect, "SET collation_connection = 'utf8_general_ci'");

	$sql = "DELETE FROM customercomment WHERE commentTime = '".$_GET["commentTime"]."'";
	$result = mysqli_query($connect, $sql);

	mysqli_close($connect);	//關閉資料庫連結
	header("location:host_comment.php");
?>  