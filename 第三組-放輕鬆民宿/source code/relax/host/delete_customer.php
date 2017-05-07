 <?php
	// 連接mysql
	include "connect_db.php";

	$customerID = $_GET["id"];
	
	//確認顧客ID是否在訂單裡
	$searchCustomer = "SELECT * FROM roomorder WHERE customerID = '$customerID'";
	$result = mysqli_query($connect, $searchCustomer);
	$checkCustomerID = mysqli_num_rows($result);
	
	if($checkCustomerID > 0) {	//刪除的顧客ID存在訂單
		echo "<script type='text/javascript'>alert('訂單中仍有此顧客資訊 故無法刪除此顧客'); location.href='host_customer_edit.php'</script>";
		mysqli_close($connect);
	}
	else {
		$sql = "DELETE FROM customer WHERE customerID = ".$customerID;  //刪除資料
		mysqli_query($connect, $sql);
		mysqli_close($connect); 
		header("location:host_customer_edit.php");
	}
?>	