<?php
	include "connect_db.php";

	$customerName = $_POST["customerName"];
	$cellphone = $_POST["cellphone"];
	$accountNumber = $_POST["accountNumber"];
	
	$search = "SELECT * FROM customer WHERE customerName = '$customerName' AND cellphone = '$cellphone' AND accountNumber = '$accountNumber'";
	$result = mysqli_query($connect, $search);
	if(mysqli_num_rows($result) > 0) {
		echo "<script type='text/javascript'>alert('此顧客資料已存在'); location.href='host_customer_edit.php'</script>";
		mysqli_close($connect);
	}
	else{
		$searchMaxID = "SELECT MAX(customerID) AS max_ID FROM customer";
		$result = mysqli_query($connect, $searchMaxID);
		$row = mysqli_fetch_array($result);
		$customerID = $row["max_ID"]+1;
		$sql = "INSERT INTO `customer` VALUES ('$customerID', '$customerName', '$cellphone', '$accountNumber');";
		mysqli_query($connect, $sql);
		mysqli_close($connect); 
		header("location:host_customer_edit.php"); 
	}
?>