<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript">
			function loginFail() {
				sessionStorage.setItem("loginFail", "yes");
				window.location.assign("host_login.php");
			}
		</script>
	</head>
	<body>
		<?php
			error_reporting(0);
			session_start(); 
			include("connect_db.php");
		?>
		<?php
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM login WHERE username ='$username' AND password = '$password' LIMIT 1";
			$result = $connect->query($sql);

			if($result->num_rows == 1) {
				$rows = $result->fetch_array(MYSQLI_NUM);
				//$_SESSION['username'] = $rows['username'];
				$sql2 = "UPDATE login SET status = 1 WHERE username ='$username' AND password = '$password'";
				$connect->query($sql2);
				echo "<script type='text/javascript'>loginSuccess('$username');</script>";
				header("location:host_homepage.php");
			}
			else {
				echo "<script type='text/javascript'>loginFail();</script>";
			}
			mysqli_close($connect);
		?>
	</body>
</html>