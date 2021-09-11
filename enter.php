<?php

// ******** update your personal settings ******** 
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";
session_start();
//$user_name=$_SESSION['username'];
//Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "<h2 align='center'><font color='antiquewith'> 資料不全</font></h2>";	
} 
if (isset($_POST['member_ID'])&& isset($_POST['psw'])&& isset($_POST['member_type'])) {
	$member_ID = $_POST['member_ID'];
    $psw = $_POST['psw'];
    $member_type = $_POST['member_type'];
	
	$sql="SELECT * FROM `_member` where member_ID='$member_ID' and psw='$psw' and member_type='$member_type';";
	
	$result=mysqli_query($conn,$sql);
	
	
	$row=mysqli_num_rows($result);
	$get= mysqli_num_fields($result);
	
	if($row){
		
		$_SESSION['user']=$member_ID;
		$_SESSION['member_type']=$member_type;
		
		$sql="update _member set login=1 where member_ID='$member_ID' and psw='$psw' and member_type='$member_type';";
	
	    $result=mysqli_query($conn,$sql);
		
		if($member_type=='seller'){
		echo "<!DOCTYPE html>
        <html>
        <head>
        <title> </title>
		<body bgcolor='#FFCCCC'>
        </head>
        <body>
        <h1 align='center'>Hello, <font color=' #C10066'>$member_ID</font> !</h1>
		<h6 align='center'><a href='main.php' target='_self' title='回到首頁'style='text-decoration:none;color:palevioletred'>回到首頁</a></h6>
        <h6 align='center'><a href='seller_index.php' target='_self' title='回自己的賣場'style='text-decoration:none;color:palevioletred'>回自己的賣場</a></h6>
		<h6 align='center'><a href='logout.php' target='_self' title='登出'style='text-decoration:none;color:palevioletred'>登出</a></h6>
		</body>
        </html>";
		}
		else{
			echo "<!DOCTYPE html>
        <html>
        <head>
        
		<body bgcolor='#FFCCCC'>
        </head>
        <body>
        <h1 align='center'>Hello, <font color=' #C10066'>$member_ID</font>!</h1>
		<h6 align='center'><a href='main.php' target='_self' title='回到首頁'style='text-decoration:none;color:palevioletred'>回到首頁</a></h6>

		</body>
        </html>";
		}

	    //exit();
	}
	else{
		echo "<!DOCTYPE html>
        <html>
		<body bgcolor='#FFCCCC'>
		<h1 align='center'><font face='微軟正黑體'>登入失敗，輸入錯誤或是尚未註冊</h1>
		<h6 align='center'><a href='enter_index.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>
		</html>";
	}

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='enter_index.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}

				
?>

