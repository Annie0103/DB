<?php

// ******** update your personal settings ******** 
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";
session_start();
//$user_name=$_SESSION['username'];
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
if (isset($_POST['search'])) {
	
    $search = $_POST['search'];
    if(empty($_POST['search'])){
		
		
	}
	$sql="SELECT * FROM good where good_name like '%$search%'";
	
	$result=mysqli_query($conn,$sql);

	if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    }

	
	$row=mysqli_num_rows($result);


	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#FFE4E1"><form action="shopping_cart.php" method="post" >	
	    <h1 align="center" ><font color='antiquewith' size='7' face="Comic Sans MS">
		<?php
		if(empty($_POST['search'])){
		
		    echo "ALL PRODUCT";  
			  
	    }
		else{
		    echo "SEARCH RESULT"; 
		}
		
		?></font></h1>
		<table width="100%" border="1" bgcolor="#FFB7DD" align="center" style="border:4px #C10066 solid" >
      
		<tr>
		  <th><font face="Comic Sans MS">商品編號/Good ID</font></th> 
		  <th><font face="Comic Sans MS">商品名稱/Good Name</font></th> 	  
		  <th><font face="Comic Sans MS">類別/Kind</font></th>
		  <th><font face="Comic Sans MS">價格/Price</font></th> 
		  <th><font face="Comic Sans MS">庫存/Quantity</font></th> 
		  <th><font face="Comic Sans MS">商品介紹/Introduce</font></th> 
		  
		</tr>
		<?php  
		for($i=0;$i<$row;$i++){
		  
		  $d=mysqli_fetch_row($result);
		  $kind="select kind_name from category where kind_ID='$d[4]'";
		  $kind_result=mysqli_query($conn,$kind);
		  $kind_get=mysqli_fetch_row($kind_result);
		?>
		
		<tr>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[0] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[2] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $kind_get[0] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[3] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[5] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[10] ?></td>
		</tr>
		
		
		<?php 
		}
		
		
		?>
		
	
	  </table>
	  	   輸入商品編號加入購物車:<input type="text" name="good_ID"  ></td>
	       <input type="submit" value="加入">
	  </form>
	  
	  	<h6 align="center"><a href="main.php" target="_self" style="text-decoration:none;color:palevioletred">返回</a></h6>

	</body>
<?php
}

else{
	echo "
	<body bgcolor='#FFCCCC'>
	<h2 align='center'><font color='black'>輸入不完全</font></h2>
	<h6 align='center'><a href='enter_index.php' target='_self' title='再試一次'style='text-decoration:none;color:palevioletred'>再試一次</a></h6>";
}

?>				


