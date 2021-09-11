<html style="height: 100vh">

<head>
	<title>賣家頁面</title>
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
	
	
	<div style="position: absolute;width:250px; height:50px; border:4px #880000 solid; margin-left:80%;margin-top:1%;">
    <a href='shopping_cart.php'><input type="button" value="SHOPPING CART" style="width:250px ; height:50px ; font-size:28px; border:5px blue none; background-color:#FFCCCC;"></a>
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
 
<table style="width: 100%" >
<tr >
<td align="center" style="position:absolution;" ><font align="center" size="6" >MY PRODUCT</td>
</tr>

</table>
 

<tr>
<td style="width: 100vh; height:50hv">

		<?php

        include("good_list.html");

        ?>



<?php
    $servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

	//session_start();
	$temp=$_SESSION['user'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	
?>



</td>
		
</tr>

 
</td>
        
</tr>
 
</table></center>
	    <div style="position: absolute; margin-left:30%;" ><a href="good_edit.php" target="_self"  style="text-decoration:none;color:palevioletred">修改商品資訊</a></div>
        <div style="width:220px; margin-left:60%;position:relation"><a href="create_good.html" target="_self" style="text-decoration:none;color:palevioletred">新增商品</a></div>
        <br><div style="width:220px; margin-left:48%;position:relation"><a href="seller_post.php" target="_self" style="text-decoration:none;color:palevioletred">查看評論</a></div>

	
	<br><br><br><br>
	
<center><table border="1" style="width: 100vh">
<tr>
<td valign="top" style="width: 100vh">
 
<table style="width: 100vh">
<tr>
<td align="center" ><font size="6">SALE TABLE</td>
</tr>
</table>

<tr>
<td style="width: 100vh; height:50hv">
<?php 
  
   include("seller_sold_out.php");
?>


</td>
		
</tr>

 

 
</td>
</tr>
</table></center>
	
	
	</form>
	<h6 align="center"><a href="seller_order.php" target="_self" style="text-decoration:none;color:palevioletred">我的訂單</a></h6>
	<br>
	
	
	<h6 align="center"><a href="logout.php" target="_self" title="登出" style="text-decoration:none;color:palevioletred">登出</a></h6>
	<h6 align="center"><a href="information_edit.php" target="_self" title="修改會員基本資料" style="text-decoration:none;color:palevioletred">修改基本資料</a></h6>
</body>
	
</html>
