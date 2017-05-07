<html>
	<head>
		<title>放輕鬆民宿管理系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "Shortcut Icon" type="image/x-icon" href="host_picture/icon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="host_frame_css.css" />
		<link rel="stylesheet" type="text/css" href="host_mode_css.css" />
		<script src="host_frame_js.js"></script>
		<script src="sorttable.js"></script>

		<style type = "text/css">
			th {
				color: #FFFFFF
			}
		</style>
		<script>
			function changeData() {
				var x = document.getElementById("id2").value;
				if(x=="") $('.disable').attr('disabled', true);
				else $('.disable').attr('disabled', false);
  			}
		</script>
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
									<li><a href="host_homepage.php">首頁</a></li>
									<li class="active"><a href="host_customer.php">顧客資訊</a></li>
									<li><a href="host_order.php">訂單資訊</a></li>
									<li><a href="host_comment.php">評論管理</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="host_logout.php">登出</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="row-md-2">
						<!-- 模式切換 -->
						<div class="col-md-3">
							<div class="btn-group btn-group-justified">
								<a href="host_customer.php" class="btn btn-mode active" role="button">檢視模式</a>
								<a href="host_customer_edit.php" class="btn btn-mode" role="button">編輯模式</a>
							</div>
						</div>
						<div class="col-md-3"></div>
						<!-- 搜尋 -->
						<div class="col-md-6">
							<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
								<div class="col-md-4">
									<select class="form-control input-sm" name="choice" id="id2" onchange="changeData()">
										<option value="">請選擇</option>
		　								<option value="customerName">顧客姓名</option>
		　								<option value="cellphone">顧客電話</option>
		　								<option value="accountNumber">金融帳號</option>
									</select>
								</div>
								<div class="col-md-6">
									<div id="changeType">
										<input class="form-control input-sm disable" type="text" name="data" id="id1" disabled />
									</div>
								</div>
								<div class="col-md-2">
									<input class="btn btn-mode input-sm" type="submit" name="submit" value="搜尋" />
								</div>
							</form>
						</div>
					</div>
					<br/><br/><br/>
					<div class="row-md-8">
						<div class="col-md-12 center">
<!-- ======================================================================================================================================================= -->
							<!-- 表格 -->
							<table class="table table-hover sortable" style="border: 4px #ce5656 solid; width: 90%;" rules="all">
								<colgroup>
									<col style="width: 15%">
									<col style="width: 15%">
									<col style="width: 25%">
									<col style="width: 45%">
								</colgroup>
								<thead bgcolor="#ce5656">
									<tr>
										<th>顧客編號</th>
										<th>顧客姓名</th>
										<th>連絡電話</th>
										<th>金融帳號</th>
									</tr>
								</thead>
								<tbody>
									<?php
										include "connect_db.php";
										if($_SERVER["REQUEST_METHOD"] == "POST" && empty(!$_POST["data"]) && empty(!$_POST["choice"])){
											$choice = $_POST["choice"];
											$data = $_POST["data"];
											$sql = "SELECT * FROM customer WHERE $choice = '$data' ORDER BY customerID asc";
										}
										else if(empty(!$_GET[findCustomer])){
											$findCustomer=$_GET[findCustomer];
											$sql = "SELECT * FROM customer WHERE customerID = '$findCustomer'";
										}
										else $sql = "SELECT * FROM customer ORDER BY customerID asc";
										$result = mysqli_query($connect,$sql);
										if($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<tr><td>" . $row["customerID"]. "</td>";
												echo "<td>" . $row["customerName"]. "</td>";
												echo "<td>" . $row["cellphone"]. "</td>";
												echo "<td>" . $row["accountNumber"]. "</td></tr>";
											}
										}
										mysqli_close($connect);
									?>
								</tbody>
							</table>
<!-- ======================================================================================================================================================= -->
						</div>
					</div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>