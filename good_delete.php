<?php

// ******** update your personal settings ******** 
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";
session_start();

//Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
	echo "<h2 align='center'><font color='antiquewith'> 資料不全</font></h2>";	
} 

//echo $_SESSION['user'];
if (!empty($_POST['delete_good_ID'])) {
	
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	$good=$_POST['delete_good_ID'];

	$delete="delete from good where seller_ID='$sell' and good_ID='$good'";
	$result=mysqli_query($conn,$delete);
	
	
	echo "<meta http-equiv='refresh' content='0;url=http://localhost/good_edit.php'/>";	

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='information_edit.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}
				
?>

