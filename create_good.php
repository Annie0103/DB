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
if (isset($_POST['good_name'])&& isset($_POST['price'])&& isset($_POST['good_kind_ID'])) {
	$good_name = $_POST['good_name'];
    $price = $_POST['price'];
    $good_kind_ID = $_POST['good_kind_ID'];
	$quantity=$_POST['quantity'];
	$Provider=$_POST['Provider'];
	$Produce_date=$_POST['Produce_date'];
	$Made_in=$_POST['Made_in'];
	$Introduce=$_POST['Introduce'];
	$good_picture=$_POST['good_picture'];
	$seller_ID=$_SESSION['user'];
	$dt=date('Y-m-d H:i:s');
	
	
	$insert_sql = "INSERT INTO good(seller_ID,good_name,price,good_kind_ID,quantity,good_picture,Provider,Produce_date,Made_in,Introduce,create_time)
	VALUES('$seller_ID',
	'$good_name','$price','$good_kind_ID','$quantity','$good_picture','$Provider','$Produce_date','$Made_in',
	'$Introduce','$dt')";

	// ******** update your personal settings ******** 
	if ($conn->query($insert_sql) === TRUE) {
		echo "<h2 align='center'>新增成功!!</h3>
		<h6 align='center'><a href='create_good.html' style='text-decoration:none;color:palevioletred'>新增其他商品</a></h6>";
		echo "<h6 align='center'><a href='seller_index.php' target='_self' title='回個人賣場'style='text-decoration:none;color:palevioletred'>回個人賣場</a></h6>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='enter_index.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}

				
?>

