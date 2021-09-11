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
$ID=$_POST['good_ID'];
$sql = "select good_ID from good where good_ID='$ID' ";
	
$result=mysqli_query($conn,$sql);
$temp=mysqli_num_rows($result);
if (isset($_SESSION['user'])&&isset($_SESSION['member_type'])&& $temp>=1) {
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	$ID=$_POST['good_ID'];
	$_SESSION['good_ID']=$ID;
	
	$sql = "select * from good where good_ID='$ID'";
	
	$result=mysqli_query($conn,$sql);
	
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	
	
	$data=mysqli_fetch_row($result);
	$kind="select kind_name from category where kind_ID='$data[4]'";
	$kind_result=mysqli_query($conn,$kind);
	$kind_get=mysqli_fetch_row($kind_result);
	
		
		echo"<html><h1 align='center'><font color='#C10066' face='Comic Sans MS'>修改商品資料</h1><body bgcolor='#FFE4E1'><form action='good_dooedit.php' method='post' >	
	  <table width='1150' border='1' bgcolor='#FFB7DD' align='center' style='border:4px #C10066 solid;'>
		
		<tr>
		  <td bgcolor='#FFCCCC' width='800'colspan='2' align='center' valign='middle'><font size='6' face='微軟正黑體'>原資訊</td><td width='350' bgcolor='#FFCCCC'align='center' valign='middle'><font size='6' face='微軟正黑體'>修改</td>
		</tr>
		<tr>
		  
		  <th ><font face='Comic Sans MS'>商品名稱/Good Name</th>
		  <td bgcolor='#FFCCCC' width='350' align='center'><font face='Comic Sans MS'>$data[2]</td><td>修改:<input type='text' name='name'  /></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>價格/Price</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$data[3]</td><td>修改:<input type='text' name='price' /></td>
		</tr>

       <tr>
		  <th><font face='Comic Sans MS'>類別/Kind</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$kind_get[0]</td> <td>修改:<input  type='text' name='kind' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>庫存/Quantity</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$data[5]</td> <td>修改:<input type='text' name='num' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>製造商/Manufactory</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[7]</td> <td>修改:<input type='text' name='manu' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>製造日期/Produce Date</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[8]</td> <td>修改:<input type='text' name='pd' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>生產地/Made In</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[9]</td> <td>修改:<input type='text' name='madein' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>商品介紹/Introduce</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[10]</td> <td>修改:<input type='text' name='introduce' ></td>
		</tr>
		
		<tr>
		  <td colspan='3' align='center'><input type='submit' value='確認'/></td>
		</tr>
	  </table>
	
	  </html>
	  ";
		
		echo "<h6 align='center'><a href='seller_index.php' target='_self' style='text-decoration:none;color:palevioletred'>放棄修改<br>返回賣場</a></h6>
</h6>";

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>沒有這項品</font></h2>
	<h6 align='center'><a href='good_edit.php' target='_self'style='text-decoration:none;color:palevioletred'>回上一頁</a></h6>";
}

				
?>

