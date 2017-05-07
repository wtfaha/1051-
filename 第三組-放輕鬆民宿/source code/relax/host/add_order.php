<?php
	include "connect_db.php";
	
	$bigAmount = $_POST["bigAmount"];
	$smallAmount = $_POST["smallAmount"];
	$checkInDate = $_POST["checkInDate"];
	$checkOutDate = $_POST["checkOutDate"];
	$customerID = $_POST["customerID"];
	$customerNumber = $_POST["customerNumber"];
	$payDeposit = $_POST["payDeposit"];
	$payBalance = $_POST["payBalance"];
	
	//確認入住時間小於退房時間
	if($checkInDate >= $checkOutDate){
		echo "<script type='text/javascript'>alert('入住時間必須小於退房時間'); location.href='host_order_edit.php'</script>";
		mysqli_close($connect);
	}
	
	//判斷房間是否已滿
	$bigAmountTotal = 0;
	$smallAmountTotal = 0;
	
	//原入=新入 (原退=<>新退)
	$search = "SELECT * FROM roomorder WHERE checkInDate = '$checkInDate'";
	$result = mysqli_query($connect, $search);
	if(mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$bigAmountTotal += $row["bigAmount"];
			$smallAmountTotal += $row["smallAmount"];
		}
	}
	
	//原入<新入 (原退=<>新退) 原退>新入
	$search = "SELECT * FROM roomorder WHERE checkInDate < '$checkInDate' AND checkOutDate > '$checkInDate'";
	$result = mysqli_query($connect, $search);
	if(mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$bigAmountTotal += $row["bigAmount"];
			$smallAmountTotal += $row["smallAmount"];
		}
	}
	
	//原入>新入 原入<新退 原退>=新入
	$search = "SELECT * FROM roomorder WHERE checkInDate > '$checkInDate' AND checkInDate < '$checkOutDate' AND checkOutDate => '$checkInDate'";
	$result = mysqli_query($connect, $search);
	if(mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$bigAmountTotal += $row["bigAmount"];
			$smallAmountTotal += $row["smallAmount"];
		}
	}
	
	//提示房間已滿的錯誤訊息
	if($bigAmount + $bigAmountTotal > 2 && $smallAmount + $smallAmountTotal <= 2){
		echo "<script type='text/javascript'>alert('該時段大間房間已滿'); location.href='host_order_edit.php'</script>";
		mysqli_close($connect);
	}
	else if($smallAmount + $smallAmountTotal > 2&& $bigAmount + $bigAmountTotal <= 2){
		echo "<script type='text/javascript'>alert('該時段小間房間已滿'); location.href='host_order_edit.php'</script>";
		mysqli_close($connect);
	}
	else if($smallAmount + $smallAmountTotal > 2&& $bigAmount + $bigAmountTotal > 2){
		echo "<script type='text/javascript'>alert('該時段大間和小間房間已滿'); location.href='host_order_edit.php'</script>";
		mysqli_close($connect);
	}
	
	$day = (strtotime($checkOutDate) - strtotime($checkInDate)) / 86400;	//算天數
	$totalPrice = ($bigAmount*2000 + $smallAmount*1800)*$day;

	$searchCustomer = "SELECT * FROM customer WHERE customerID = '$customerID'";
	$result = mysqli_query($connect, $searchCustomer);
	$checkCustomerID = mysqli_num_rows($result);
	
	if($checkCustomerID == 0) {	//新增的顧客ID不存在
		echo "<script type='text/javascript'>alert('新增的顧客ID不存在'); location.href='host_order_edit.php'</script>";
		mysqli_close($connect);
	} 
	else if($checkCustomerID > 0) {
		$searchMaxID = "SELECT MAX(orderID) AS max_ID FROM roomorder";
		$result = mysqli_query($connect, $searchMaxID);
		$row = mysqli_fetch_array($result);
		$orderID = $row["max_ID"]+1;
		
		$sql = "INSERT INTO roomorder VALUES ('$orderID', '$bigAmount', '$smallAmount', '$checkInDate', '$checkOutDate', '$customerID', '$customerNumber', '$payDeposit', '$payBalance', '$totalPrice');";
		mysqli_query($connect, $sql);
		mysqli_close($connect); 
		header("location:host_order_edit.php"); 
	}
	
?>