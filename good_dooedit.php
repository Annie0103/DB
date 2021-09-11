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
if (!empty($_POST['name'])||!empty($_POST['price'])
	||!empty($_POST['kind'])||!empty($_POST['num'])
	||!empty($_POST['manu'])||!empty($_POST['pd'])
	||!empty($_POST['madein'])
	||!empty($_POST['introduce'])&&!empty($_SESSION['good_ID'])) {
	
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	
	$name=$_POST['name'];
	$price=$_POST['price'];
	$kind=$_POST['kind'];
	$num=$_POST['num'];
	$manu=$_POST['manu'];
	$pd=$_POST['pd'];
	$madein=$_POST['madein'];
	$introduce=$_POST['introduce'];
	$good_ID=$_SESSION['good_ID'];
	
	
	if(!empty($_POST['name'])){
	$sql = "update good set good_name='$name' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
    if(!empty($_POST['price'])){
	$sql = "update good set price='$price' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['kind'])){
	$kind="select kind_ID from category where kind_name='$kind'";
	$kind_result=mysqli_query($conn,$kind);
	$kind_get=mysqli_fetch_row($kind_result);
	$sql = "update good set good_kind_Id='$kind_get[0]' where good_ID='$good_ID'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['manu'])){
	$sql = "update good set Provider='$manu' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['pd'])){
	$sql = "update good set Produce_date='$pd' where good_ID='$good_ID'";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['num'])){
	$sql = "update good set quantity='$num' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['madein'])){
	$sql = "update good set Made_in='$madein' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	if(!empty($_POST['introduce'])){
	$sql = "update good set Introduce='$introduce' where good_ID='$good_ID' ";
	$result=mysqli_query($conn,$sql);
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	}
	
	
	echo"<meta http-equiv='refresh' content='0;url=http://localhost/good_edit.php'/>";	

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='information_edit.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}
				
?>

