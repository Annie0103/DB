<?php
session_start();


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
<title>MY ORDERED ITEM</title>
</head>
<body>
<h1 align="center">MY ORDERED ITEM</h1>

<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
<?php /*<tr>
<td>訂單id</td>
<td>商品id</td>
<td>賣家</td>
<td>商品名稱</td>
<td>價格</td>
<td>庫存</td>
<td>總金額</td>
</tr>*/
?>
<?php


    $consumer_ID = $_SESSION['user'];
    $sql = "SELECT distinct order_ID FROM ordered_good where consumer_ID = '$consumer_ID'";
	$result = mysqli_query($conn,$sql);
	 
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	
	while($order_ID = mysqli_fetch_row($result)) 
	{
		//echo $order_ID[0];
		$sql1 = "SELECT * FROM good where good_ID in (SELECT good_ID from ordered_good where order_ID = '$order_ID[0]')";
	    $result1 = mysqli_query($conn,$sql1);
		
		if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }
		$total=0;
		?>
		<tr>
        <td>訂單id</td>
        <td>商品id</td>
        <td>賣家</td>
        <td>商品名稱</td>
        <td>價格</td>
        <td>庫存</td>
        <td>總金額</td>
        </tr>
		
		<?php
		while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC )){
		
			$total=$row['price']+$total;
		?>
		<tr>
        <td><?php echo $order_ID[0]; ?> </td>
        <td><?php echo $row['good_ID']; ?> </td>        
        <td><?php echo $row['seller_ID'];   ?></td> 
        <td><?php echo $row['good_name']; ?></td>      
        <td><?php echo $row['price'];   ?></td>
        <td><?php echo $row['quantity'];   ?></td> 
        
		
	<?php } ?>
	    <td><?php echo $total; ?> </td></tr>
	<?php } ?>

<?php
echo "<h2 align='center'><font color='antiquewith'><a href='main.php'>返回主頁</a></font></h2>";?>

</body>
</html>