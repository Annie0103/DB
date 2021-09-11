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
if (!empty($_POST['last_name'])||!empty($_POST['first_name'])
	||!empty($_POST['city'])||!empty($_POST['district'])
	||!empty($_POST['street'])||!empty($_POST['num'])||!empty($_POST['f'])||
	!empty($_POST['zip_code'])||!empty($_POST['phone'])) {
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	
	$last=$_POST['last_name'];
	$first=$_POST['first_name'];
	$city=$_POST['city'];
	$district=$_POST['district'];
	$street=$_POST['street'];
	$num=$_POST['num'];
	$f=$_POST['f'];
	$zip=$_POST['zip_code'];
	$phone=$_POST['phone'];
	
	
	if(!empty($_POST['last_name'])){
	$sql = "update _member set last_name='$last' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
    if(!empty($_POST['first_name'])){
	$sql = "update _member set first_name='$first' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['city'])){
	$sql = "update _member set city='$city' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['district'])){
	$sql = "update _member set district='$district' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['street'])){
	$sql = "update _member set street='$street' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['num'])){
	$sql = "update _member set num='$num' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['f'])){
	$sql = "update _member set f='$f' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['zip_code'])){
	$sql = "update _member set zip_code='$zip' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['phone'])){
	$sql = "update _member set phone='$phone' where member_ID='$sell' and member_type='$type'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	echo"<meta http-equiv='refresh' content='0;url=http://localhost/information_edit.php'/>";	

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='information_edit.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}
				
?>

