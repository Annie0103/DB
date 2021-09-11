<?php  
$servername = "140.122.184.132";
                $username = "team12";
				$password = "DBk49V66ckl9izf";
				$dbname = "team12";
?>

<html>



<?php
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

/*if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}*/

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
	echo "<h2 align='center'><font color='antiquewith'> 資料不全</font></h2>";	
} 

if (!empty($_SESSION['user'])&&!empty($_SESSION['member_type'])) {
	$sell=$_SESSION['user'];
	$type=$_SESSION['member_type'];
	
	$sql = "select * from good where seller_ID='$sell'";
	
	$result=mysqli_query($conn,$sql);
	
	if(!$result){
        echo "Error:".mysqli_error($conn);
        exit();
    }

    $row=mysqli_num_rows($result);
	
	
	
		//$data=mysqli_fetch_row($result);

		//$data=mysqli_fetch_row($result);
	    /*$kind="select kind_name from category where kind_ID='$data[4]'";
		$kind_result=mysqli_query($conn,$kind);
		$kind_get=mysqli_fetch_row($kind_result);*/

?>		


<h1 align="center" ><font color='#C10066' size='7'>修改商品 </h1>
<body bgcolor="#FFE4E1">
<form action="good_doedit.php" method="post" >	
	    <table width="1150" border="1" bgcolor="#FFB7DD" align="center" style="border:4px #C10066 solid" >
        
		<tr>
		  <th><font face="Comic Sans MS">商品編號/Good ID</font></th> 
		  <th><font face="Comic Sans MS">商品名稱/Good Name</font></th> 
		  <th><font face="Comic Sans MS">價格/Price</th>
		  <th><font face="Comic Sans MS">類別/Kind</th> 
		  <th><font face="Comic Sans MS">庫存/Quantity</th>
		  <th><font face="Comic Sans MS">製造商/Manufactory</th> 
		  <th><font face="Comic Sans MS">製造日期/Produce Date</th>
		  <th><font face="Comic Sans MS">生產地/Made in</th> 
		  <th><font face="Comic Sans MS">商品介紹/Introduce</th>
		  
			
		</tr>
		
		<?php  
		
		for($i=0;$i<$row;$i++){
		  $data=mysqli_fetch_row($result);
		  $kind="select kind_name from category where kind_ID='$data[4]'";
		  $kind_result=mysqli_query($conn,$kind);
		  $kind_get=mysqli_fetch_row($kind_result);
		?>
		
		<tr>
		  <td bgcolor="#FFCCCC" width="350" align="center"><font face="Comic Sans MS"><?php echo $data[0] ?></td>
		  <td bgcolor="#FFCCCC" width="350" align="center"><font face="Comic Sans MS"><?php echo $data[2] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[3] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $kind_get[0] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[5] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[7] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[8] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[9] ?></td>
		  <td bgcolor="#FFCCCC" align="center"><font face="Comic Sans MS"> <?php echo $data[10] ?></td>
		  
			
		
 
		<?php 
		}
		}
		else{
		echo "<h2 align='center'><font color='antiquewith'> 資料不完全</font></h2>";
		}
		
		?>
		</tr>
		<tr>  
		
		<td align='left' colspan='9'>輸入想修改的商品編號 : <input type='text' name="good_ID" /><input type='submit' value='修改'/>
		</form>
		<form action="good_delete.php" method="post">
		    <br>輸入想刪除的商品編號 : <input type='text' name="delete_good_ID" /><input type='submit' value='刪除'/></td>
		</form>
		
		</tr>
	  </table>
	  
	  <h6 align='center'><a href='seller_index.php' target='_self' style='text-decoration:none;color:palevioletred'>放棄修改<br>返回賣場</a></h6>
</h6>
	</body>
</html>