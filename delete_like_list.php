<?php
session_start();

// ******** update your personal settings ******** 
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$GID = $_POST['good_ID'];
$consumer_ID = $_SESSION['user'];


if (isset($GID)) {
    $delete_sql = "DELETE FROM like_list where good_ID = '$GID' and consumer_ID = '$consumer_ID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "<h2 align='center'><font color='antiquewith'>刪除成功!<br><a href='main.php'>返回主頁</a></font></h2>";
    }else{
        echo "<h2 align='center'><font color='antiquewith'>刪除失敗!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>