<?php
	include "connect_db.php";

	$customerName = $_POST["customerName"];
	$score = $_POST["score"];
	$comment = $_POST["comment"];

	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	
	
	if($customerName==""){
		echo "<script type='text/javascript'>alert('請填寫名字進行評論'); location.href='customerComment.php'</script>";
		mysqli_close($connect);
	}
	else {
		$sql = "INSERT INTO customercomment VALUES ('$customerName', '$score', '$comment', '$date');";
		mysqli_query($connect, $sql);
		mysqli_close($connect); 
		header("location:customerComment.php"); 
		
	}

?>