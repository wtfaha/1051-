<html>
	<head>
		<title>放輕鬆民宿管理系統</title>
		<meta charset="utf-8">
		<meta http-equiv="refresh"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "Shortcut Icon" type = "image/x-icon" href = "host_picture/icon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="host_frame_css.css">
		<script src="host_frame_js.js"></script>
		<style type = "text/css">
			#loginFail {
				color: red;
			}
		</style>
		<script></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-2 sidenav"></div>
				<div class="col-md-8 center">
					<div class="row-md-1 center" style="height: 15%"></div>
					<div class="row-md-8 center">
<!-- ======================================================================================================================================================= -->
					<h1 class="text-center" style="color: #2e2d4d"><strong>放輕鬆民宿管理系統</strong></h1>
					<h3 class="text-center" style="color: #2e2d4d">登入</h3><br>
					<form class="form-horizontal" action="login_verification.php" method="POST">
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-4">
								<h6 class="text-center" id="loginFail"></h6>
								<input type="text" class="form-control" name="username" placeholder="帳號" autofocus /><br>
								<input type="password" class="form-control" name="password" placeholder="密碼" /><br>
								<input type="submit" class="btn btn-default center-block" value="登入" id="loginId" /><br>
							</div>
						</div>
					</form>
<!-- ======================================================================================================================================================= -->					
					</div>
				</div>
				<div class="col-md-2 sidenav"></div>
			</div>
		</div>
	</body>
</html>