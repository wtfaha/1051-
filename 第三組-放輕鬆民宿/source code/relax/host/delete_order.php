<?php
	//連接mysql
	include "connect_db.php";

	$orderID = $_GET["id"];
	
	$sql ="DELETE FROM roomorder WHERE orderID = ".$orderID;  //刪除資料

	mysqli_query($connect, $sql);
	mysqli_close($connect); 
	header("location:host_order_edit.php");
?>