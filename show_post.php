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
<title>MY POSTS</title>
</head>
<body>
<h1 align="center">MY POSTS</h1>

<?php

    $consumer_ID = $_SESSION['user'];
    $sql = "SELECT * FROM post WHERE member_ID= '$consumer_ID'";
	$result = mysqli_query($conn,$sql);
	 
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	
	$num=mysqli_num_rows($result);
	if($num==0){
	    echo "<h1 align='center'><font size='6' color='#C10066'>目前尚未評論，趕快去留下評論吧~<br><br>
		<a href='add_post.php' target='_self'  style='text-decoration:none;color:palevioletred'><font size='3'>返回</font></a></h6><br><br><br>";
		
	}
	else{
	?>
	<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
	<tr>
	<td>商品id</td>
	<td>評論</td>
	<td>評論時間</td>

	</tr>
	
	<?php
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC )){?>
	<tr>
       <td><?php echo $row['good_ID']; ?> </td>        
       <td><?php echo $row['content']; ?></td>      
       <td><?php echo $row['post_Time'];   ?></td> 
    </tr>
		
	<?php }?>
	
	<tr>
<h6 align="center"><a href="consumer_page.php" target="_self" title="回到買家頁面" style="text-decoration:none;color:palevioletred"><font size="3">回到買家頁面</font></a></h6>
    </tr>
	<?php } ?>

</body>
</html>