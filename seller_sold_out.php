<html>

<?php  
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";

//session_start();

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
	

	$good_quantity=" select * from good where seller_ID='$sell'";
	
	
	
	$result=mysqli_query($conn,$good_quantity);
	
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }

    $row=mysqli_num_rows($result);
	if($row==0){
	    echo "<h1 align='center'><font size='6' color='#C10066'>目前沒有商品，趕快加入吧~<br><br><br><br><br>";
		
	}
	
	else{

		$check="select good_ID from ordered_good ";
		$time="select distinct build_time, good_ID  from _order natural join 
		ordered_good where good_ID in (select good_ID from good where seller_ID='$sell' and good_ID in (select good_ID from ordered_good ))";
		
		
		$c_result=mysqli_query($conn,$check);
		$time_result=mysqli_query($conn,$time);
		
		$number="select quantity,sold_out from good where seller_ID='$sell' ";
		$number_result=mysqli_query($conn,$number);
	    $c_row=mysqli_num_rows($c_result);//2
?>
		

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#FFE4E1"><form action="accept_order.php" method="post" >	
	    <table width="100%" border="1" bgcolor="#FFB7DD" align="center" style="border:4px #C10066 solid" >
        
		<tr>
          <th><font face="Comic Sans MS">商品編號/Good ID</font></th> 		
		  <th><font face="Comic Sans MS">商品名稱/Good Name</font></th> 
		  <th><font face="Comic Sans MS">價格/Price</font></th>
		  <th><font face="Comic Sans MS">賣出數量/Number Of Sold Out </font></th> 
		  <th><font face="Comic Sans MS">庫存數量/Quantity</font></th>
		  
		</tr>
		<?php  
		for($i=0;$i<$row;$i++){
		  
		  $d=mysqli_fetch_row($result);
		  $t=mysqli_fetch_row($time_result);
		  $n=mysqli_fetch_row($number_result);
		?>
		
		<tr>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[0]; ?></td> 
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[2]; ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $d[3] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $n[1] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $n[0] ?></td>
		  
		
		</tr>
		
		
		<?php 
		}
		}
		}
		?>
		
	  </table>
	  </form>
	</body>
</html>