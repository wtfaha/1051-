<!-- bookRoom -->
<html>
	<head>
		<title>eLax民宿</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- META 的功能僅是用來註明這些網頁資訊，且提供給瀏覽器或是搜尋引擎，並非是要給寫給瀏覽網頁的＂人＂看的內容。-->
        
		<!-- 設計自己blog的瀏覽器網址icon圖示 -->
		<link rel = "Shortcut Icon" type = "image/x-icon" href = "customer_picture/icon.ico" />
      
		<!-- 加載Bootstrap --> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- 加載css、js -->
		<link rel="stylesheet" type="text/css" href="customer_frame_css.css">
		<script src="customer_frame_js.js"></script>
		
		<!-- 加入以下css即可修改最上面背景圖片 -->
		<!-- 務必要加在載入customer_frame_css.css之後才可以覆蓋掉-->	
		<style type = "text/css">
			.jumbotron{
				/*background-color: white; */
				background-image: url('customer_picture/homepage3.jpg');	/* 最上面的背景 在此修改圖片* //* 建議大小為828x315 */
				background-repeat:no-repeat;
				opacity: 0.8;
				margin: 0;
				padding: 0;
				border: 0;
				padding-left: 3%;
				/*color: #2e2d4d;*/
				height: 70%;
				background-size: cover;
				text-align: center;	/*字體水平置中*/
				vertical-align: middle;/*nouse*/
				/*line-height: 70%;*/
			}
		</style>
		
		<script>
		
		</script>
	</head>
	<body>
	<div class="container-fluid">
	<div class="row content">
		<div class="jumbotron wrapper">
			<div class="textCss titleCenter">
				<h1>Re<br>Lax</h1>
				<h6>Homestay in Hualien</h6>
			</div>
		</div>
		<div class="col-md-12 center">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="customerHomepage.html">放輕鬆民宿</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="houseInfo.html">民宿資訊</a></li>
							<li><a href="roomInfo.html">房間資訊</a></li>
							<li><a href="bookRoom.html">我要訂房</a></li>
							<li class="active"><a href="checkBookInfo.html">查看訂單</a></li>
							<li><a href="surround.html">附近導覽</a></li>
							<li><a href="customerComment.php">使用者評論</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="row-md-8 center">
<!-- ======================================================================================================================================================= -->
			<br><center><div class="panel panel-primary" style="border:4px #2e2d4d solid; width:80%;"rules="all">
				<div class="panel-heading">
					<h3 class="panel-title"><center>查看訂單</center></h3>
				</div>
				<div class="panel-body">
						<?php
						include "db_conn.php";
						$customerName = $_POST['name'];
						$cellphone = $_POST['cellphone'];
						$query2 = "SELECT * FROM customer where customerName = '$customerName' and cellphone = '$cellphone' ";
							if($stmt =  $db->query($query2)){
								if(mysqli_fetch_row($stmt)<1){
									echo "<script type='text/javascript'>alert('查無此人'); location.href = 'checkBookInfo.html'</script>";
																	
								}
									
							}
						
						
						$query = "SELECT * FROM customer where customerName = '$customerName' and cellphone = '$cellphone' ";
						if($stmt =  $db->query($query)){
							$id = array();
							$i = 0;
							while($result = mysqli_fetch_row($stmt)){
								$id[$i] = $result[0];
								$i++;
								$customerID = $result[0];
								$customerName = $result[1];
								$cellphone = $result[2];
								$accountNumber = $result[3];
							
							}
							echo'<table class="table table-striped" style = " width:90%">';
							echo'<tr>';
							echo'<td style="text-align:center; width:40%">訂房姓名</td>';
							echo'<td>'.$customerName;
							echo'</td></tr>';
							echo'<tr>';
							echo'<td style="text-align:center;">電話</td>';
							echo'<td>'.$cellphone;
							echo'</td></tr>';
							echo'<tr>';
							echo'<td style="text-align:center;">轉帳帳號</td>';
							echo'<td>'.$accountNumber;
							echo'</td></tr>';
							
							echo'</table>';
							
						}
						for($j = 0; $j < $i ; $j++){
							$query1 = "SELECT * FROM roomorder where customerID  = '$id[$j]'";
								if($stmt =  $db->query($query1)){
									while($row = mysqli_fetch_row($stmt)){
										$bigAmount = $row[1];
										$smallAmount = $row[2];
										$checkInDate = $row[3];
										$checkOutDate = $row[4];
										$customerNumber = $row[6];
										$payDeposit = $row[7];
										$payBalance = $row[8];
										$totalPrice = $row[9];
										
										
										echo'<table class="table table-striped" style = " width:90%">';
										
										
										echo'<tr>';
										echo'<td style="text-align:center; width:40%">住宿日期</td>';
										echo'<td>'.$checkInDate;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">退宿日期</td>';
										echo'<td>'.$checkOutDate;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">住宿人數</td>';
										echo'<td>'.$customerNumber;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">大型雙人房</td>';
										echo'<td>'.$bigAmount;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">小型雙人房</td>';
										echo'<td>'.$smallAmount;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">總金額</td>';
										echo'<td>'.$totalPrice;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">已付訂金</td>';
										echo'<td>'.$payDeposit;
										echo'</td></tr>';
										echo'<tr>';
										echo'<td style="text-align:center;">已付尾款</td>';
										echo'<td >'.$payBalance;
										echo'</td></tr>';

										echo'</table><br><br>';
									}
								}
							
						}
						
						
						for($j = 0; $j < $i ; $j++){
						$query3 = "SELECT * FROM roomorder where customerID  = '$id[$j]'";
							if($stmt =  $db->query($query3)){
								if(mysqli_fetch_row($stmt)<1){
									$bigAmount = '';
								$smallAmount = '';
								$checkInDate = '';
								$checkOutDate = '';
								$customerNumber = '';
								$payDeposit = '';
								$payBalance = '';
								$totalPrice = '';
								
						
								}	
							}
						}
						
					?>
				</div>
			</div>	</center>	
					

<!-- ======================================================================================================================================================= -->					
			</div>
		</div>
	</body>
</html>