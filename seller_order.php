<html>

<?php  
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
	echo "<h2 align='center'><font color='antiquewith'> 資料不全</font></h2>";	
} 



if (!empty($_SESSION['user'])&&!empty($_SESSION['member_type'])) {
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	
	$good_quantity=" select * from ordered_good where good_ID in(select good_ID from good where seller_ID='$sell')";

	
	$result=mysqli_query($conn,$good_quantity);
	
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }

    $row=mysqli_num_rows($result);
    if($row==0){
	    echo "<body bgcolor='#FFE4E1'><h1 align='center' ><font color='antiquewith' size='7' face='Comic Sans MS'>  $sell 's訂單</font></h1>
		<h1 align='center'><font size='6' color='#C10066'>還沒有人訂購你的商品~<br><br><br><br><br>";
		
	}
	else{	
		$time="select build_time from _order natural join 
		ordered_good where good_ID in (select good_ID from good where seller_ID='$sell')";
		$time_result=mysqli_query($conn,$time);
	
?>
		

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#FFE4E1"><form action="accept_order.php" method="post" >	
	    <h1 align="center" ><font color='antiquewith' size='7' face="Comic Sans MS"><?php echo $sell ?> 's訂單</font></h1>
		<table width="100%" border="1" bgcolor="#FFB7DD" align="center" style="border:4px #C10066 solid" >
      
		<tr>
		  <th><font face="Comic Sans MS">編號/number</font></th> 
		  
		  <th><font face="Comic Sans MS">客戶帳號/Consumer ID</font></th> 
		  <th><font face="Comic Sans MS">商品編號/Good ID</font></th> 
		  <th><font face="Comic Sans MS">價格/Price</font></th>
		  <th><font face="Comic Sans MS">訂單生成時間/Build Time</font></th> 
		  
		</tr>
		<?php  
		for($i=0;$i<$row;$i++){
		  
		  $d=mysqli_fetch_row($result);
		  $t=mysqli_fetch_row($time_result);
		?>
		
		<tr>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $i+1/*$d[1]*/ ?></td>
		  
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[0] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[2] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[4] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $t[0] ?></td>
		</tr>
		
		
		<?php 
		}
	    }
		}
		?>
		<tr>
		   
		</tr>
	  </table>
	  </form>
	  
	  	<h6 align="center"><a href="seller_index.php" target="_self" style="text-decoration:none;color:palevioletred">返回</a></h6>

	</body>
</html>