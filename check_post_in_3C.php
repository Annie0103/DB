<html>
<body bgcolor="#FFCCCC">
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
<title>POSTS</title>
</head>
<body>
<h1 align="center">POSTS</h1>

<?php


    $consumer_ID = $_SESSION['user'];
	$kind = 4;
    $sql = "SELECT * FROM post where good_ID in(SELECT good_ID FROM good where good_kind_ID = '$kind')";
	$result = mysqli_query($conn,$sql);
	 
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	
	$row1=mysqli_num_rows($result);
	if($row1==0){
	    echo "<h1 align='center'><font size='6' color='#C10066'>目前沒有評論<br><br><br><br><br>";
		
	}
	else{?>

<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
<tr>
<td>評論編號</td>
<td>評論時間</td>
<td>商品ID</td>
<td>評論者</td>
<td>評論內容</td>
</tr>
	<?php
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC )){
		?>
		<tr>
        <td><?php echo $row['post_ID']; ?> </td>
        <td><?php echo $row['post_Time']; ?> </td>        
        <td><?php echo $row['good_ID'];   ?></td> 
        <td><?php echo $row['member_ID']; ?></td>
		<td><?php echo $row['content']; ?></td>
        </tr>
		
	<?php }} ?>

<?php
echo "<h2 align='center'><font color='antiquewith' size='4'><a href='main.php'>返回主頁</a></font></h2>";?>

</body>
</html>