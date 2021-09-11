<body bgcolor="FF8C8B4">

<?php

session_start();

// ******** update your personal settings ******** 
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

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

    $good_ID = $_POST['good_ID'];
	$content = $_POST['content'];
	$consumer_ID = $_SESSION['user'];
	
	if(isset($good_ID) && isset($content)){
	$insert_sql = "INSERT INTO post(content, member_ID, good_ID)
	VALUES('$content','$consumer_ID', '$good_ID')";

	
	if ($conn->query($insert_sql) === TRUE) {
		echo "<h2 align='center'><font color='antiquewith'>留言成功</a></font></h2>
		      <h6 align='center'><a href='show_post.php' target='_self' style='text-decoration:none;color:palevioletred'>查看我的留言</a></h6>
		      <h2 align='center'><a href='main.php'>返回主頁</a>";
	 } 
	else{
		echo "<h2 align='center'><font color='antiquewith'>留言失敗</font></h2>";
	 }
	}
	else echo "<h2 align='center'><font color='antiquewith'>資料不完全</font></h2>";
	
	

?>