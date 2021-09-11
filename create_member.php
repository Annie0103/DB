<?php

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

if (isset($_POST['last_name']) && isset($_POST['first_name'])
	&&isset($_POST['city']) && isset($_POST['district'])
	&&isset($_POST['street'])&&isset($_POST['num'])&&isset($_POST['zip_code'])
    &&isset($_POST['phone'])&&isset($_POST['psw'])&&isset($_POST['member_type'])
    &&isset($_POST['member_ID'])
    &&isset($_POST['f'])){
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$city = $_POST['city'];
	$district = $_POST['district'];
	$street=$_POST['street'];
	$num=$_POST['num'];
	$zip_code=$_POST['zip_code'];
	$phone=$_POST['phone'];
	$psw=$_POST['psw'];
	$member_type=$_POST['member_type'];
	$f=$_POST['f'];
	$member_ID=$_POST['member_ID'];

	$insert_sql = "INSERT INTO _member(member_ID,member_type,last_name,
	first_name,psw,city,district,street,num,f,zip_code,phone)
	VALUES('$member_ID','$member_type','$last_name','$first_name','$psw',
	'$city','$district','$street','$num','$f','$zip_code','$phone')";	// ******** update your personal settings ******** 
	if($member_type=='seller'){
		$_sql = "INSERT INTO seller(seller_ID)VALUES('$member_ID')";
	    $conn->query($_sql);
	}
	if ($conn->query($insert_sql) === TRUE) {
		echo "<h2 align='center'><font color='antiquewith'>新增成功!!<br> <a href='main.php'>返回主頁</a></font></h2>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		echo "<h2 align='center'><font color='antiquewith'>此帳號已被註冊</font></h2>";
		echo "<h2 align='center'><a href='create_member.html'style='color:palevioletred'>返回上一頁</a></h2>";
	}

}else{
	echo "<h2 align='center'><font color='antiquewith'> 資料不完全</font></h2>";
}
				
?>

