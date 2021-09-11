<?php
session_start();
if(!isset($_SESSION['user']))
{
	echo "<h3 align='center'><font color='FFCCCC'> 檢測到您尚未登入</font></h3>";
	echo "<h6 align='center'><a href='main.php' target='_self' title='回到首頁'style='text-decoration:none;color:palevioletred'>回到首頁</a></h6>";
	echo "<h6 align='center'><a href='enter_index.php' target='_self' title='登入'style='text-decoration:none;color:palevioletred'>登入</a></h6>";
	exit();
}



				// ******** update your personal settings ******** 
				$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";
				
				// Connect MySQL server
				$conn = new mysqli($servername, $username, $password, $dbname);
				
				// set up char set
				if (!$conn->set_charset("utf8")) {
					printf("Error loading character set utf8: %s\n", $conn->error);
					exit();
				}
				
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LIKE LIST</title>
</head>
<body>
<body bgcolor="#FFCCCC">
<h1 align="center">LIKE LIST</h1>


<?php
@$PID = $_POST['good_ID'];
$consumer_ID = $_SESSION['user'];

if (isset($PID))
{
	$sql = "SELECT * FROM good where good_ID = $PID";
    $result = mysqli_query($conn,$sql);   
 
   if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
   }

$row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );

@$good_ID = $row[good_ID];
//echo $good_ID;

$insert_sql = "INSERT INTO like_list (consumer_ID, good_ID)
	VALUES ('$consumer_ID', '$good_ID')";
if ($conn->query($insert_sql) === TRUE)
	echo "<h2 align='center'><font color='antiquewith'>增加成功<br></font></h2>";
else
	echo "<h2 align='center'><font color='antiquewith'>您的喜愛清單已有這項商品</font></h2>";

}


$goods = "SELECT * FROM good where good_ID in (SELECT good_ID FROM like_list where consumer_ID = '$consumer_ID')";

?>
<table  border="1" align="center">
<tr>
<td>商品id</td>
<td>賣家</td>
<td>商品名稱</td>
<td>價格</td>
<td>庫存</td>

</tr>

<?php

$result1 = mysqli_query($conn,$goods);   
 
if (!$result1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while($row1 = mysqli_fetch_array ( $result1, MYSQLI_ASSOC )){
?>

<tr>
<td><?php echo $row1['good_ID']; ?> </td>        
<td><?php echo $row1['seller_ID'];   ?></td> 
<td><?php echo $row1['good_name']; ?></td>      
<td><?php echo $row1['price'];   ?></td>
<td><?php echo $row1['quantity'];   ?></td> 

</tr>
    
<?php } ?>
</table>
<form action="delete_like_list.php" method="post">
<h6 align="center"><th>刪除商品ID:</th>
  <th><input type="text" name="good_ID"/></th>
  <th colspan="2"><input type="submit"  value="刪除"/></th></h6>

</form>

<form action="likelist_to_cart.php" method="post">

<h6 align="center"><th>將商品ID加入購物車:</th>
  <th><input type="text" name="good_ID"/></th>
  <th colspan="2"><input type="submit"  value="新增"/></th></h6>

</form>

<h6 align="center"><a href="main.php" target="_self" title="首頁" style="text-decoration:none;color:BB5500">首頁</a></h6>
<h6 align="center"><a href="consumer_page.php" target="_self"  style="text-decoration:none;color:BB5500">回個人頁面</a></h6>

</body>
</html>