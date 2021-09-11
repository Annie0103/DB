<?php
session_start();
if(isset($_SESSION['user'])){
	
	echo "<h3 align='center'><font color='FFCCCC'> 您已登入</font></h3>";
	if($_SESSION['member_type']=='seller'){
	echo "<h6 align='center'><a href='seller_index.php' target='_self' title='回自己的賣場'style='text-decoration:none;color:palevioletred'>回自己的賣場</a></h6>";
	//exit();
	}
	//else{
		echo "<h6 align='center'><a href='main.php' target='_self' title='回首頁'style='text-decoration:none;color:palevioletred'>回首頁</a></h6>
				<h6 align='center'><a href='logout.php' target='_self' title='登出'style='text-decoration:none;color:palevioletred'>登出</a></h6>";
	    exit();
	//}
}
?>
<html>
<head>    
	<title>會員登入系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#000000">
<body>
	<font color="FFCCCC">
	<font face="微軟正黑體">
	<h1 align="center">會員登入</h1>
	<form action="enter.php" method="post">	
	  <table width="500" border="1" bgcolor="#FFB7DD" align="center" style="border:4px #C10066 solid;">
		<tr>
		  
		  <th>帳號</th>
		  <td bgcolor="#FFCCCC"><input type="text" name="member_ID"  /></td>
		</tr>
		
		<tr>
		  <th>密碼</th>
		  <td bgcolor="#FFCCCC"><input type="text" name="psw" /></td>
		</tr>

       <tr>
		  <th>類型</th>
		  <td bgcolor="#FFCCCC"><input  type="radio" name="member_type" value="seller">
			賣家
			<input  type="radio" name="member_type" value="consumer" >
			買家</td>
		</tr>
		
		
		<tr>
		  
		  <th colspan="2"><input type="submit" value="確認"/></th>
		  
	      
		</tr>
		
	  </table>
	  
	</form>
	
	<form action="create_member.html" method="post">	
	    <h6 align="center">還不是會員? <a href="create_member.html" target="_self" title="立即註冊" style="text-decoration:none;color:palevioletred">立即註冊</a></h6>
	</form>
</body>
	
</html>
