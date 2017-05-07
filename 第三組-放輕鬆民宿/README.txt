1.運行說明 (環境設定步驟、測試帳密等)
(1)後端資料庫需透過Apache跟MySQL執行

(2)將relax.sql匯入資料庫

(3)"host/connect_db.php" 、 "customer/db_conn.php" 以及 "customer/connect_db.php" 為連線資料庫的程式。
   "host/connect_db.php" 以及 "customer/connect_db.php" 這兩個檔案內的:
   $servername 為主機名或IP位址
   $db_username 為MySQL使用者名稱
   $db_password 為MySQL使用者密碼
   $databasename 為資料庫名稱
   (請視情況修改)

   "customer/db_conn.php" 檔案內的:
   $localhost為主機名或IP位址
   $user 為MySQL使用者名稱
   $password 為MySQL使用者密碼
   $database 為資料庫名稱
   (請視情況修改)


(4)"host_homepage.php"為老闆端首頁
   "customerHomepage.html"為顧客端首頁


(5)老闆端預設登入帳號:relax，密碼:relax


2.GitHub 專案網址
https://github.com/ChuHueiYun/relax.git


3.系統額外特色功能說明
顧客端介面:
(1)結合GoogleMap讓使用者更快找到民宿位置
(2)提供180度房間全景圖觀看更多房間細節
(3)透過我要訂房以及查看訂單功能讓使用者快速訂房並查看訂單狀況
(4)使用評論功能讓民宿評價公開化

老闆端介面:
(1)提供登入功能，保護顧客以及訂單資訊
(2)提供顧客跟訂單資訊的檢視、搜尋與編輯，讓使用者管理民宿更加方便
(3)針對不適當的評論，可做刪除


4.分工情況
褚慧芸：老闆介面框架／登入登出模組／系統整合
黃晨郁：架設後端資料庫／訂單資訊和顧客資訊的新增、刪除、編輯模組
李佳育：使用者評論／評論管理／訂單資訊和顧客資訊的搜尋、排序模組
黃佳惠：顧客介面框架／民宿資訊／房間資訊
周子鑫：我要訂房／查看訂單／附近導覽