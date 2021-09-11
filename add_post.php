<html>
<body bgcolor="FF8C8B4">
<h1 align="center">ITEMS I BOUGHT</h1>
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
	
	$bought = "select * from good where good_ID in(SELECT distinct good_ID FROM ordered_good where(consumer_ID = '$consumer_ID'))";
	$result = mysqli_query($conn , $bought);  
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	?>    
	<h6 align="center"><a href="show_post.php" target="_self" title="我的留言" style="text-decoration:none;color:palevioletred"><font size="3">查看我的留言</font></a></h6>
	<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
	    <tr>
	    <td>商品id</td>
	    <td>賣家</td>
	    <td>商品名稱</td>
	 </tr>
    <?php
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC ))
	{?>

	    <tr>
        <td><?php echo $row['good_ID']; ?> </td>        
        <td><?php echo $row['seller_ID'];   ?></td> 
        <td><?php echo $row['good_name']; ?></td>      
        </tr>
	<?php } ?>
	
	<form action="do_add_post.php" method="post">
	<h6 align="center"><th>對商品留下建議：</th>
	<th><input type="text" name="good_ID" placeholder="商品ID"/></th>
	<th><input type="text" name="content" placeholder="評論" /></th>
	
    <th colspan="2"><input type="submit"  value="去留言"/></th></h6>
</table>

    </form>
	<h6 align="center"><a href='main.php' target='_self'  style='text-decoration:none;color:palevioletred;'><font size='3'>回首頁</font></a></h6><br><br><br>
	
	</html>
	
