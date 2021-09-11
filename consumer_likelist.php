<?php
//session_start();


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
<title>MY LIKE LIST</title>
</head>
<body>
<h1 align="center">MY LIKE LIST</h1>
<br><br><br>
<?php

    $consumer_ID = $_SESSION['user'];
    $sql = "SELECT * FROM good WHERE good_ID in (SELECT good_ID FROM like_list WHERE consumer_ID= '$consumer_ID') ";
	$result = mysqli_query($conn,$sql);
	 
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	
	$num=mysqli_num_rows($result);
	if($num==0){
	    echo "<h1 align='center'><font size='6' color='#C10066'>目前沒有喜愛的商品，趕快去逛逛吧~<br><br><br><br><br>";
		
	}
	else{
	?>
	<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
	<tr>
	<td>商品id</td>
	<td>賣家</td>
	<td>商品名稱</td>
	<td>價格</td>
	<td>庫存</td>

	</tr>
	
	<?php
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC )){?>
	<tr>
       <td><?php echo $row['good_ID']; ?> </td>        
       <td><?php echo $row['seller_ID'];   ?></td> 
       <td><?php echo $row['good_name']; ?></td>      
       <td><?php echo $row['price'];   ?></td>
       <td><?php echo $row['quantity'];   ?></td> 
    </tr>
		
	<?php }?>
	
	<tr>
    <h6 align="center">
    <div style=" align:center; position:relation"><a href="add_like_list.php" target="_self" style="text-decoration:none;color:CC0000"><font size="3">查看喜愛清單詳情</font></a></div></h6>
    </tr>
	<?php }?>

</body>
</html>