<html>
	<head>
	</head>
	<body>
		<?php
			$localhost = 'localhost';
			$user = 'root';		//資料庫連線帳號
			$password = '15192353';		//資料庫連線密碼
			$database = 'relax';
			 //進行連線
			$db = mysqli_connect($localhost, $user, $password, $database);
			if (mysqli_connect_errno()) {
				printf ("Connect failed: ".mysqli_connect_error());
				exit();
			}
			mysqli_set_charset($db,"utf8");//設定編碼
			mysqli_select_db($db,"relax"); //連線狀態中更換資料庫
			//mysqli_close()//斷掉連接
		?> 
	</body>
</html>