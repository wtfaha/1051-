<html>
	<head>
		<title>放輕鬆民宿管理系統</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="Shortcut Icon" type="image/x-icon" href="host_picture/icon.ico" />
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
			td {
				overflow: hidden;
			}
			td a {
				display: block;
				margin: -10em;
				padding: 10em;
			}
		</style>
		<script>
			//搜尋
			function changeData() {
				var x = document.getElementById("id2").value;
				var obj = document.getElementById("id1");
				var div = document.getElementById("changeType");
				if(x == "checkInDate" || x == "checkOutDate") {
					div.innerHTML = "<input class='form-control input-sm' type='date' name='data' id='id1'/>";
				}
				else if(x == "payDeposit" || x == "payBalance")
					div.innerHTML = "<select class='form-control input-sm' name='data' id='id1' style='float: right;'><option value='是'>已付 </option><option value='否'>未付 </option>";  			
				else div.innerHTML = "<input class='form-control input-sm disable' type='text' name='data' id='id1'/>";
				if(x=="") $('.disable').attr('disabled', true);		
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
									<li><a href="host_customer.php">顧客資訊</a></li>
									<li class="active"><a href="host_order.php">訂單資訊</a></li>
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
								<a href="host_order.php" class="btn btn-mode active" role="button">檢視模式</a>
								<a href="host_order_edit.php" class="btn btn-mode" role="button">編輯模式</a>
							</div>
						</div>
						<div class="col-md-3"></div>
						<!-- 搜尋 -->
						<div class="col-md-6">
							<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
								<div class="col-md-4">
									<select class="form-control input-sm" name="choice" id="id2" onchange="changeData()">
										<option value="">請選擇</option>
			　								<option value="checkInDate">入住時間</option>
			　								<option value="checkOutDate">退房時間</option>
			　								<option value="customerID">顧客編號</option>
			　								<option value="payDeposit">訂金</option>
			　								<option value="payBalance">尾款</option>
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
							<?php
								include "connect_db.php";

								if($_SERVER["REQUEST_METHOD"] == "POST" && empty(!$_POST["data"]) && empty(!$_POST["choice"])) {
									$choice = $_POST["choice"];
									$data = $_POST["data"];	
									$sql = "SELECT * FROM roomorder WHERE $choice = '$data' ORDER BY orderID";
								}
								else $sql = "SELECT * FROM roomorder ORDER BY orderID";
								$result = mysqli_query($connect, $sql);
								echo "<table class='table table-hover sortable' style='border: 4px #ce5656 solid; font-size: 14px;' rules='all'>
										<colgroup>
										<col style='width: 10%'>
										<col style='width: 9%'>
										<col style='width: 9%'>
										<col style='width: 14%'>
										<col style='width: 14%'>
										<col style='width: 9%'>
										<col style='width: 9%'>
										<col style='width: 9%'>
										<col style='width: 9%'>
										<col style='width: 8%'>
										</colgroup>
											<thead bgcolor='#ce5656'>
												<tr>
													<th>訂單編號</th>
													<th>大間數量</th>
													<th>小間數量</th>
													<th>入住時間</th>
													<th>退房時間</th>
													<th>顧客編號</th>
													<th>入住人數</th>
													<th>已付訂金</th>
													<th>已付尾款</th>
													<th>總金額</th>
												</tr>
											</thead>
										<tbody>";
								if(mysqli_num_rows($result) > 0) {
								// output data of each row
									while($row = mysqli_fetch_assoc($result)) {
										$day = (strtotime($row["checkOutDate"]) - strtotime($row["checkInDate"])) / 86400;	//算天數
										$totalPrice = ($row["bigAmount"]*2000 + $row["smallAmount"]*1800)*$day;
										$orderID = $row["orderID"];
										mysqli_query($connect, "UPDATE roomorder SET totalPrice = '$totalPrice' WHERE orderID = '$orderID'");
										echo "<tr><td>".$row["orderID"]."</td>".
												"<td>".$row["bigAmount"]."</td>".
												"<td>".$row["smallAmount"]."</td>".
												"<td>".$row["checkInDate"]."</td>".
												"<td>".$row["checkOutDate"]."</td>"?>
												<td><a href="host_customer.php?findCustomer= <?php echo $row[customerID]?>" style="text-decoration: none; color:black;"><?php echo $row["customerID"]?></a></td>
										<?php echo	"<td>".$row["customerNumber"]."</td>".
												"<td>".$row["payDeposit"]."</td>".
												"<td>".$row["payBalance"]."</td>".
												"<td>".$totalPrice."</td></tr>";		
									}
								}				
								echo "</tbody></table>";
								mysqli_close($connect);
							?>
<!-- ======================================================================================================================================================= -->
						</div>
					</div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>