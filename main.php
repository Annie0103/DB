<?php
      session_start();
	  
?>
<!DOCTYPE html>
<html>
<head>
	<title>ALL YOU NEED</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFCCCC">
<body>
	
<form action="search.php" method="post">	

<style type="text/css">
#thediv{
width:240px; height:70px;
background:#FFCCCC;
}
</style>
<script type="text/javascript">
window.onload=function(){
var obt=document.getElementById("qq");
var odiv=document.getElementById("thediv");
var yy=document.getElementById("ss");
obt.onclick=function(){
if(odiv.style.display=="none"){
odiv.style.display="block";

obt.style.display="none";
yy.style.display="block";
}
else{
odiv.style.display="none";

}
}
}
</script>
<body>
<div   style="margin-left:50%;position: absolute; width:240px; height:70px;margin-left:600px; ">
<div id="thediv" style="width:240px; height:70px;margin-top:15%; position:absolute;display:none;"><input  id="thediv" type="text" name="search" placeholder="輸入商品名稱" ></div>
<input type="button" id="qq" name="s" value="SEARCH"   style="font-face:'Comic Sans MS';font-size:28px;margin-top:15%;position: absolute; width:240px; height:70px; border-top:4px #880000 solid; border-bottom:4px #880000 solid;background-color:#FFCCCC;border-left:4px blue none;border-right:4px blue none;">
    <input id="ss" type="submit" style="display:none;margin-left:100%;margin-top:15%;width:50px; height:75px;font-size:29px;background-color:#FFCCCC" value=" ►" >
</div> 

</form>


<form action="main_show_categories.php" method="post">
	<div style="position: absolute; width:220px; height:140px; border:3px #880000 dashed;">
        <font size = "7" face="Comic Sans MS"><b><i>ALL YOU &nbsp NEED</b></i></font>
    </div>







	<?php
	 
	if(!isset($_SESSION['user']))
	{ 
	?>
	<div style="width:220px; height:140px; border:1px #880000 solid; margin-left:1200px; right:0;">
        <br/> <br/> <font>&nbsp </font>
		<a href='enter_index.php'><input type="button" value="Login" style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;"></a>
    </div>
	<?php } ?>
	<?php
	if(isset($_SESSION['user']))
	{
		?>
	    <div style="position: absolute;width:260px; height:50px; border:1px #880000 solid; margin-left:930px;">
		<a href='consumer_page.php'><input type="button" value="CUSTOMER HOME" style="width:260px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;"></a>
        </div>
		<?php if($_SESSION['member_type']=='seller'){ ?>
		
		<div style="position: absolute;width:260px; height:50px; border:1px #880000 solid; margin-left:930px;margin-top:90px">
		<a href='seller_index.php'><input type="button" value="SELLER HOME" style="width:260px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;"></a>
        </div>
		
		<?php } ?>
		
	
	<?php
	$ID =$_SESSION['user'];
	 ?>
	   <div style="width:220px; height:140px; border:1px #880000 solid; margin-left:1200px;">
        <br/> <font size="4" >&nbsp &nbsp &nbsp WELCOME  &nbsp &nbsp &nbsp <b><i><?php echo $ID; ?> </b></i></font> <br/>
		<a href='logout.php'><input type="button" value="LOGOUT" style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;"></a>
       </div>
	<?php } ?>
	
	    <font>&nbsp </font>
		<tr>
		<div style="width:1450px; height:50px; border:1px #880000 solid;">
		<font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </font>
        <input type="submit" name="cloth" value="CLOTH" action='main_show_categories.php' style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;">
        <font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </font>
		<input type="submit" name="food" value="FOOD" action='main_show_categories.php' style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;">
		<font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </font>
		<input type="submit" name="dailyused" value="DAILY USED" action='main_show_categories.php' style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;">
		<font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </font>
		<input type="submit" name="3c" value="3C" action='main_show_categories.php' style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;">
		<font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </font>
		<input type="submit" name="book" value="BOOK" action='main_show_categories.php' style="width:200px ; height:50px ; font-size:28px; border:2px blue none; background-color:#FFCCCC;">
		</div>

	<div class="slider_container">
	<div>
		<img src="6.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="7.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="8.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="9.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="10.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="11.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="12.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="13.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="14.jpg" alt="pure css3 slider" />
	</div>
	<div>
		<img src="15.jpg" alt="pure css3 slider" />
	</div>
	
	</div>
	
<style>
	.slider_container {
    margin-left: 400px;
    width: 400px;
    height: 280px;
    position: absolute;
    border: 0px solid none;    
    border-color: FFB7DD;
    border-bottom-width: 0px;
    background-color: FFB7DD;
    }

    .slider_container div {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    }
	
	.slider_container div {
    -webkit-animation: round 50s linear infinite;
            animation: round 50s linear infinite;
}

@-webkit-keyframes round {
    4% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    20% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    24% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}
@keyframes round {
    4% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    20% {
        opacity: 1;
        filter: alpha(opacity=100);
    }
    24% {
        opacity: 0;
        filter: alpha(opacity=0);
    }
}

.slider_container div:nth-child(10) {
    -webkit-animation-delay: 0s;
            animation-delay: 0s;
}

.slider_container div:nth-child(9) {
    -webkit-animation-delay: 5s;
            animation-delay: 5s;
}

.slider_container div:nth-child(8) {
    -webkit-animation-delay: 10s;
            animation-delay: 10s;
}

.slider_container div:nth-child(7) {
    -webkit-animation-delay: 15s;
            animation-delay: 15s;
}

.slider_container div:nth-child(6) {
    -webkit-animation-delay: 20s;
            animation-delay: 20s;
}

.slider_container div:nth-child(5) {
    -webkit-animation-delay: 25s;
            animation-delay: 25s;
}

.slider_container div:nth-child(4) {
    -webkit-animation-delay: 30s;
            animation-delay: 30s;
}

.slider_container div:nth-child(3) {
    -webkit-animation-delay: 35s;
            animation-delay: 35s;
}

.slider_container div:nth-child(2) {
    -webkit-animation-delay: 40s;
            animation-delay: 40s;
}

.slider_container div:nth-child(1) {
    -webkit-animation-delay: 45s;
            animation-delay: 45s;
}

</style>
</body>	
</html>
