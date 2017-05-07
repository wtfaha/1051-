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
		<link rel="stylesheet" type="text/css" href="host_mode_css.css" />
		<script src="host_frame_js.js"></script>
		<script src="sorttable.js"></script>		
		<script src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>	
		<style type = "text/css">
			th {
				color: #FFFFFF
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
		<script type="text/javascript">
			$(document).ready(function() {
				$('.editRoom').editable('edit_order.php', { 
					data: "{'0':'0','1':'1','2':'2'}",
					type: 'select',
					cancel: '<button type="button" class="btn btn-default btn-xs">取消</button>',
					submit: '<br><button type="button" class="btn btn-default btn-xs">儲存</button>',
					indicator: '儲存中',
					tooltip: '點擊修改',
				});
			});
			$(document).ready(function() {
				$('.editCustomerNumber').editable('edit_order.php', { 
					data: "{'0':'0','1':'1','2':'2','3':'3','4':'4','5':'5','6':'6','7':'7','8':'8','9':'9','10':'10'}",
					type: 'select',
					cancel: '<button type="button" class="btn btn-default btn-xs">取消</button>',
					submit: '<br><button type="button" class="btn btn-default btn-xs">儲存</button>',
					indicator: '儲存中',
					tooltip: '點擊修改',
				});
			});
			$(document).ready(function() {
				$('.editPay').editable('edit_order.php', { 
					data: "{'是':'是','否':'否'}",
					type: 'select',
					cancel: '<button type="button" class="btn btn-default btn-xs">取消</button>',
					submit: '<br><button type="button" class="btn btn-default btn-xs">儲存</button>',
					indicator: '儲存中',
					tooltip: '點擊修改',
				});
			});
			$(document).ready(function() {
				$('.editText').editable('edit_order.php', { 
					type: 'textarea',
					cancel: '<button type="button" class="btn btn-default btn-xs">取消</button>',
					submit: '<br><button type="button" class="btn btn-default btn-xs">儲存</button>',
					indicator: '儲存中',
					tooltip: '點擊修改',
				});
			});
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
								<a href="host_order.php" class="btn btn-mode" role="button">檢視模式</a>
								<a href="host_order_edit.php" class="btn btn-mode active" role="button">編輯模式</a>
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
							<table id='myTable' class='table table-hover sortable' style='border: 4px #ce5656 solid; font-size: 14px;' rules='all'>
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
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php
									include "connect_db.php";
									if ($_SERVER["REQUEST_METHOD"] == "POST" && empty(!$_POST["data"]) && empty(!$_POST["choice"])) {
										$choice = $_POST["choice"];
										$data = $_POST["data"];
										$sql = "SELECT * FROM roomorder WHERE $choice = '$data' ORDER BY orderID";
									}
									else $sql = "SELECT * FROM roomorder ORDER BY orderID ";
									$result = mysqli_query($connect, $sql);
									while($row = mysqli_fetch_array($result)) {
										echo "<tr>
												<td>".$row["orderID"]."</td>
												<td class='editRoom' id='bigAmount_".$row["orderID"]."'>".$row["bigAmount"]."</td>
												<td class='editRoom' id='smallAmount_".$row["orderID"]."'>".$row["smallAmount"]."</td>
												<td class='editText' id='checkInDate_".$row["orderID"]."'>".$row["checkInDate"]."</td>
												<td class='editText' id='checkOutDate_".$row["orderID"]."'>".$row["checkOutDate"]."</td>
												<td id='customerID_".$row["orderID"]."'>".$row["customerID"]."</td>
												<td class='editCustomerNumber' id='customerNumber_".$row["orderID"]."'>".$row["customerNumber"]."</td>
												<td class='editPay' id='payDeposit_".$row["orderID"]."'>".$row["payDeposit"]."</td>
												<td class='editPay' id='payBalance_".$row["orderID"]."'>".$row["payBalance"]."</td>										
												<td><a href='delete_order.php? id=".$row["orderID"]."'><button style='width: 50px; height: 20px; background-color: #443a3e; color: #FFFFFF; font-size: 12px; border: 0px none;'>刪除</button></a></td>
											</tr>";
									}
								?>
								</tbody>
							</table>
							<!-- 新增 -->
							<!-- Trigger the modal with a button -->
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">新增訂單</button>
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">新增訂單內容</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="add_order.php">
												<div class="form-group" >
													<label>入住日期:</label>
													<input type="date" class="form-control" name="checkInDate" />
													<label>退房日期:</label>
													<input type="date" class="form-control" name="checkOutDate" />													
													<label>大間數量:</label>
													<select class="form-control" name="bigAmount">
														<option>0</option>
														<option>1</option>
														<option>2</option>
													</select>
													<label>小間數量:</label>
													<select class="form-control" name="smallAmount">
														<option>0</option>
														<option>1</option>
														<option>2</option>
													</select>
													<label>顧客編號:</label>
													<input type="text" class="form-control" name="customerID" />
													<label>入住人數:</label>
													<select class="form-control" name="customerNumber">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>10</option>
													</select>
													<label>已付訂金:</label>
													<select class="form-control" name="payDeposit">
														<option>是</option>
														<option>否</option>
													</select>
													<label>已付尾款:</label>
													<select class="form-control" name="payBalance">
														<option>是</option>
														<option>否</option>
													</select>
												</div>
												<button type="submit" class="btn btn-default">新增</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
										</div>
									</div>
								</div>
							</div>
<!-- ======================================================================================================================================================= -->
						</div>
					</div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>