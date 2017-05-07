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
			function changeData() {
				var x = document.getElementById("id2").value;
				if(x=="") $('.disable').attr('disabled', true);
				else $('.disable').attr('disabled', false);
  			}
		</script>
		<script type="text/javascript">		
			$(document).ready(function() {
				$('.editText').editable('edit_customer.php', { 
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
								<a href="host_customer.php" class="btn btn-mode" role="button">檢視模式</a>
								<a href="host_customer_edit.php" class="btn btn-mode active" role="button">編輯模式</a>
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
							<table class="table table-hover sortable" style="border: 4px #ce5656 solid; width: 90%;"rules="all">
								<colgroup>
									<col style="width: 15%">
									<col style="width: 15%">
									<col style="width: 25%">
									<col style="width: 35%">
									<col style="width: 10%">
								</colgroup>
								<thead bgcolor="#ce5656">
									<tr>
										<th>顧客編號</th>
										<th>顧客姓名</th>
										<th>連絡電話</th>
										<th>金融帳號</th>
										<th></th>
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
										else $sql = "SELECT * FROM customer";
										$result = mysqli_query($connect, $sql);
										while($row = mysqli_fetch_array($result)) { 
											echo "<tr>
											<td>".$row["customerID"]."</td>
											<td class='editText' id='customerName_".$row["customerID"]."'>".$row["customerName"]."</td>
											<td class='editText' id='cellphone_".$row["customerID"]."'>".$row["cellphone"]."</td>
											<td class='editText' id='accountNumber_".$row["customerID"]."'>".$row["accountNumber"]."</td>
											<td><a href='delete_customer.php?id=".$row["customerID"]."'><button style='width:50px;height:22px;background-color:#443a3e;color:#FFFFFF;font-size:12px;border:0px none;'>刪除</button></a></td>
											</tr>";
										}
									?>
								</tbody>
							</table>
							<!-- 新增 -->
							<!-- Trigger the modal with a button -->
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">新增顧客</button>
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">新增顧客</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="add_customer.php">
												<div class="form-group" >
													<label>顧客姓名:</label>
													<input type="text" class="form-control" name="customerName" />
													<label>連絡電話:</label>
													<input type="text" class="form-control" name="cellphone" />
													<label>金融帳號:</label>
													<input type="text" class="form-control" name="accountNumber" />
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