<?php
	$id = $_POST['id'];
	$value = $_POST['value'];
	list($field, $id) = explode('_', $id);

	include "connect_db.php";	// 連接mysql

	mysqli_query($connect, "UPDATE roomorder SET $field = '$value' WHERE orderID = '$id'");
	echo $value;
?>