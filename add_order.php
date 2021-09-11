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
	
	$insert_sql = "INSERT INTO _order(consumer_ID)
	VALUES('$consumer_ID')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "<h2 align='center'><font color='antiquewith'>訂單已成立</a></font></h2>
		      <h6 align='center'><a href='show_ordered.php' target='_self' style='text-decoration:none;color:palevioletred'>查看已訂購商品</a></h6>
		      <h2 align='center'><a href='main.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}
	
	$order_ID = mysqli_insert_id($conn);

	$quantity = 1;
	
	/*$sql = "SELECT * FROM _order where consumer_ID = '$consumer_ID'";
	
	$result = mysqli_query($conn , $sql);  
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    
	
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC ))
	{*/
	    $goods = "SELECT * FROM good where good_ID in (SELECT good_ID FROM shopping_cart where consumer_ID = '$consumer_ID')";
	    $result1 = mysqli_query($conn,$goods);  
        
		if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }	
		
		while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC ))
		{
			//echo $row1['good_ID'];
			
			$uniprice = $row1['price'];
			$good_ID = $row1['good_ID'];
			
			$insert_sql1 = "INSERT INTO ordered_good(consumer_ID, order_ID, good_ID, quantity, uniprice)
	        VALUES('$consumer_ID', '$order_ID', '$good_ID', '$quantity', '$uniprice')";
			$conn->query($insert_sql1);
			
			//$order_ID1 = mysqli_insert_id($conn);
			//echo $order_ID;
			
			
			//$sold_out = 1;
			$update_sql = "UPDATE good
					SET sold_out=sold_out+1
					where good_ID in(select distinct good_ID  from _order natural join ordered_good where order_ID='$order_ID') ";
			$conn->query($update_sql);
			/*$update_sql = "UPDATE good
					SET quantity=quantity-1
					where good_ID='$good_ID' and select order_ID from ordered_good where order_ID= '$order_ID')";
			*/
			$update_sql = "UPDATE good
					SET quantity=quantity-1
					where good_ID in(select distinct good_ID from _order natural join ordered_good where order_ID='$order_ID') ";
			
			
			$conn->query($update_sql);
		} 	
	//}
	
	$delete_cart = "DELETE FROM shopping_cart where consumer_ID = '$consumer_ID' ";
	$conn->query($delete_cart);
	
	

?>