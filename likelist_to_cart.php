
<html>
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

$consumer_ID = $_SESSION['user'];
$PID = $_POST['good_ID'];

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

$insert_sql = "INSERT INTO shopping_cart (consumer_ID, good_ID)
	VALUES ('$consumer_ID', '$good_ID')";
if ($conn->query($insert_sql) === TRUE)
	echo "<h2 align='center'><font color='antiquewith'>增加成功<br></font></h2>";
else
	echo "<h2 align='center'><font color='antiquewith'>您的購物車已有這項商品</font></h2>";

}


$delete_sql = "DELETE FROM like_list where good_ID = '$PID' and consumer_ID = '$consumer_ID'";
$conn->query($delete_sql);

$goods = "SELECT * FROM good where good_ID in (SELECT good_ID FROM shopping_cart where consumer_ID = '$consumer_ID')";

?>

<h1 align="center">MY SHOPPING CART</h1>
<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
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


<h6 align="center"><a href="main.php" target="_self" title="登出" style="text-decoration:none;color:palevioletred">首頁</a></h6>

</body>
</html>