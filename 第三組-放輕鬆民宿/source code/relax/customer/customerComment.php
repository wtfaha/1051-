<!-- customerComment -->
<html>
	<head>
		<?php
			error_reporting(0);
			include("connect_db.php");
		?>
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

		<style type = "text/css">
			th	{color:#FFFFFF}	
            .star{
                color:#0080FF
            }			
		</style>
		
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
							<li><a href="checkBookInfo.html">查看訂單</a></li>
							<li><a href="surround.html">附近導覽</a></li>
							<li class="active"><a href="#">使用者評論</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="row-md-8">
				<div class="col-md-12 center">
<!-- ======================================================================================================================================================= -->
				<br>
				<center><table class="table table-bordered" style="border:4px #56494e solid; width:90%;"rules="all">
					<colgroup>
						<col style="width: 20%">
						<col style="width: 10%">
						<col style="width: 35%">
						<col style="width: 30%">
					</colgroup>
					<thead bgcolor="#a29c9b">
						<tr>
							<th>發表</th>
							<th>評分</th>
							<th>留言</th>
							<th>日期</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$sql = "SELECT * FROM customercomment ORDER BY commentTime desc";
							$result = mysqli_query($connect, $sql);
							if($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["customerName"]. "</td><td>";
									for($i=0; $i<$row["score"]; $i++) {
										echo "<span class='star'>★</span>" ;
									}
									echo "</td><td>" . $row["comment"]. "</td><td>" . $row["commentTime"]. "</td></tr>";
								
								} 
							}
							mysqli_close($connect);
						?>
					</tbody>				
				</table>						
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">我要評價</button>
							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form method="post" action="add_comment.php">
												<div class="form-group" >
													<label>顧客姓名</label>
													<input type="text" class="form-control" name="customerName" />
													<label>評分</label>
													<select class="form-control" name="score">
														<option>5</option>
														<option>4</option>
														<option>3</option>
														<option>2</option>
														<option>1</option>
													</select>	
													<label>留言</label>
													<input type="text" class="form-control" name="comment" />
												</div>
												<button type="submit" class="btn btn-default">新增</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
										</div>
									</div>
								</div>
							</div></center>
<!-- ======================================================================================================================================================= -->					
					</div>
			</div>
		</div>
	</body>
</html>