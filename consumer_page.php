<?php
    $servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

   // session_start();
	
	@$temp=$_SESSION['user'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result="select good_picture,good_name from good where seller_ID='$temp'";
	$picture=mysqli_query($conn,$result);

?>

<html style="height: 100vh">

<head>
	<title>CONSUMER HOME</title>
	    <link rel='stylesheet' type='text/css' href='./css/index1.css'>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFCCCC">
<body>
	<font color="#C10066" size="6">
	<font face="微軟正黑體">
	
	<div style="margin-down:50% ;margin-right:50%;position: absolute; width:220px; height:140px; border:3px #880000 dashed;">
       <a href="main.php" target="_self" style="text-decoration:none;color:palevioletred"><font size = "7" face="Comic Sans MS"><b><i>ALL YOU &nbsp NEED</b></i></font></a>
    </div>
	
	
	<div style="position: absolute;width:250px; height:50px; border:1px #880000 solid; margin-left:80%;margin-top:1%;">
    <a href='shopping_cart.php'><input type="button" value="SHOPPING CART" style="width:250px ; height:50px ; font-size:28px; border:3px #880000 solid; background-color:#FFCCCC;"></a>
    </div>
	
	
	<div style=" position:relation;margin-down:30%;margin-left:3%">
	<h1 align="center" >
	<?php
	session_start();
	echo "<font color='#A20055' face='Comic Sans MS'>";
	echo $_SESSION['user'];?><font color="#C10066" face="Comic Sans MS"> ,  &ensp;Welcome !<br> <br></h1>
	
	<form action="good_edit.php" method="post">	
	
	</div>
	
	
	
	 
<center>
<table border="1"  style="width: 100vh">
<tr>
<td valign="top" style="width: 100vh">
 <h1 align="center" valign="center">MY ORDERED ITEM</h1>
<table style="width: 100vh" >


 

<tr>
<td style="width: 100vh; height:50hv">


</td>
<?php

    $consumer_ID = $_SESSION['user'];
    $sql = "SELECT distinct order_ID FROM ordered_good where consumer_ID = '$consumer_ID'";
	$result = mysqli_query($conn,$sql);
	 
	if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
	
	$row=mysqli_num_rows($result);
	if($row==0){
	    echo "<h1 align='center'><font size='6' color='#C10066'>目前沒有訂購商品，趕快去逛逛吧~<br><br><br><br><br>";
		
	}
	else{
	while($order_ID = mysqli_fetch_row($result)) 
	{
		//echo $order_ID[0];
		$sql1 = "SELECT * FROM good where good_ID in (SELECT good_ID from ordered_good where order_ID = '$order_ID[0]')";
	    $result1 = mysqli_query($conn,$sql1);
		
		if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }
		?>
		
		<table style="border:3px #A42D00 dashed;" cellpadding="10" border='1' align="center">
        <tr>
        <td>訂單id</td>
        <td>商品id</td>
        <td>賣家</td>
        <td>商品名稱</td>
        <td>價格</td>
        <td>庫存</td>
        </tr>
		
		<?php
		while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC )){
		?>
		<tr>
        <td><?php echo $order_ID[0]; ?> </td>
        <td><?php echo $row['good_ID']; ?> </td>        
        <td><?php echo $row['seller_ID'];   ?></td> 
        <td><?php echo $row['good_name']; ?></td>      
        <td><?php echo $row['price'];   ?></td>
        <td><?php echo $row['quantity'];   ?></td> 
        </tr>
		
	<?php }}} ?>

</td>
		
</tr>
 
</td>
        
</tr>
 </table>
</table></center></br>
	
<center>
<table border="1" style="width: 100vh">
<tr>

 

<tr>
<td> <?php include("consumer_likelist.php"); ?> </td>

<table>
<tr>
<br><br><br><br><br>

</tr>
</table></center>
    </form>
	<h6 align="center"><a href="add_post.php" target="_self" title="留言區" style="text-decoration:none;color:palevioletred"><font size="3">留言區</font></a></h6>
	<h6 align="center"><a href="information_edit.php" target="_self" title="修改會員基本資料" style="text-decoration:none;color:palevioletred"><font size="3">修改基本資料</font></a></h6>
	<h6 align="center"><a href="logout.php" target="_self" title="登出" style="text-decoration:none;color:palevioletred">登出</a></h6>

</body>
	
</html>
