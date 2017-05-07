<html>
	<head>
		<title>放輕鬆民宿管理系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="Shortcut Icon" type="image/x-icon" href="host_picture/icon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="host_frame_css.css" />
		<script src="host_frame_js.js"></script>
		<script></script>
		<?php
			//login status
			error_reporting(0);
			session_start(); 
			include("connect_db.php");
			$username = "<script type='text/javascript'>document.write(logout1());</script>";
			$sql = "SELECT * FROM login WHERE status = 0 LIMIT 1";
			$result = $connect->query($sql);
			if($result->num_rows == 1) {
				header("location:host_login.php");
			}
			mysqli_close($connect);
		?>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-2 sidenav"></div>
				<div class="col-md-8 center">
					<div class="jumbotron jumbotronCSS">
						<h2>Re<br>Lax</h2>
						<h6>Homestay in Hualien</h6>
					</div>
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="">放輕鬆民宿</a>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
								<ul class="nav navbar-nav">
									<li class="active"><a href="#">首頁</a></li>
									<li><a href="host_customer.php">顧客資訊</a></li>
									<li><a href="host_order.php">訂單資訊</a></li>
									<li><a href="host_comment.php">評論管理</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="host_logout.php">登出</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="row-md-8 center">
						<img src="host_picture/host_homepage.jpg" style="width:100%" />
					</div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>