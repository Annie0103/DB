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
if (isset($_SESSION['user'])&&isset($_SESSION['member_type'])) {
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	
	$sql = "select * from _member where member_ID='$sell' and member_type='$type'";
	
	$result=mysqli_query($conn,$sql);
	
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }
	
	//$row=mysqli_num_rows($result);
	
	
	//for($i=0;$i<$row;$i++){
		$data=mysqli_fetch_row($result);
		echo"<html><h1 align='center'><font color='#C10066' face='Comic Sans MS'>修改個人資料</h1><body bgcolor='#FFE4E1'><form action='information_doedit.php' method='post' >	
	  <table width='1150' border='1' bgcolor='#FFB7DD' align='center' style='border:4px #C10066 solid;'>
		
		<tr>
		  <td bgcolor='#FFCCCC' width='800'colspan='2' align='center' valign='middle'><font size='6' face='微軟正黑體'>原資訊</td><td width='350' bgcolor='#FFCCCC'align='center' valign='middle'><font size='6' face='微軟正黑體'>修改</td>
		</tr>
		<tr>
		  
		  <th ><font face='Comic Sans MS'>姓/Last Name</th>
		  <td bgcolor='#FFCCCC' width='350' align='center'><font face='Comic Sans MS'>$data[2]</td><td>修改:<input type='text' name='last_name'  /></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>名/First Name</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$data[3]</td><td>修改:<input type='text' name='first_name' /></td>
		</tr>

       <tr>
		  <th><font face='Comic Sans MS'>居住城市/City</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$data[5]</td> <td>修改:<input  type='text' name='city' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>區/District</th>
		  <td bgcolor='#FFCCCC'align='center'><font face='Comic Sans MS'>$data[6]</td> <td>修改:<input type='text' name='district' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>街/Street</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[7]</td> <td>修改:<input type='text' name='street' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>號/Number</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[8]</td> <td>修改:<input type='text' name='num' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>樓/Floor</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[9]</td> <td>修改:<input type='text' name='f' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>郵遞區號/Zip Code</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[10]</td> <td>修改:<input type='text' name='zip_code' ></td>
		</tr>
		<tr>
		  <th><font face='Comic Sans MS'>連絡電話/Phone</th>
		  <td bgcolor='#FFCCCC' align='center'><font face='Comic Sans MS'>$data[11]</td> <td>修改:<input type='text' name='phone' ></td>
		</tr>
		<tr>
		  <td colspan='3' align='center'><input type='submit' value='確認'/></td>
		</tr>
	  </table>
	
	  </html>
	  ";
		if($_SESSION['member_type']=='seller'){
		echo "<h6 align='center'><a href='seller_index.php' target='_self' style='text-decoration:none;color:palevioletred'>放棄修改<br>返回賣場</a></h6>       
</h6>";
		}
		else{
			echo "<h6 align='center'><a href='consumer_page.php' target='_self' style='text-decoration:none;color:palevioletred'>放棄修改<br>返回賣場</a></h6>       
</h6>";
		}

}
else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>尚未登入</font></h2>
	<h6 align='center'><a href='enter_index.php' target='_self'style='text-decoration:none;color:palevioletred'>去登入</a></h6>";
}

				
?>

