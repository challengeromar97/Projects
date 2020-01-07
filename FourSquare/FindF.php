<?php

$ID1 = $_COOKIE['Log'];
session_start();
if (isset($_SESSION['ID'])){	
$ID2 = $_SESSION['ID']	;}

$FUName1 = $_GET['Search'];
$Conn2= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
$Dbase2 =@mysql_select_db('foursquare',$Conn2) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write2= "select * from uaccounts where ID = '$ID1' or ID = '$ID2' or (UName = '$UName1' or Email = '$UName1' and Password = '$Password1')";
$Result2 =@mysql_query($Write2,$Conn2) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
if(mysql_num_rows($Result2) > 0){
$Write3= "select * from accounts where ID = '$ID1' or ID = '$ID2' or (UName = '$UName1' or Email = '$UName1' and Password = '$Password1')";
$Result3 =@mysql_query($Write3,$Conn2) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
while ($User =@mysql_fetch_array($Result3)){
$ID = $User[0];
$FName = $User[1];
$LName =$User[2];
$UName = $User[3];
$Password = $User[4];
$Email = $User[5];
$Birthday = $User[6];
$AEmail = $User[7];
$PNumber = $User[8];
$ZCode = $User[9];
$SQuestion =$User[10];
$SAnswer =$User[11];
$Sex = $User[12];
$Signup = $User[14];
$PIMG = $User[15];
$BIMG = $User[16];
$Messages = $User[17];
$Friends = $User[18];
$Posts = $User[19];
$Thanks = $User[20];
$MoviesW = $User[21];



?>


<!doctype html>
<html lang=''>
<head>
	<title> Friends </title>
<script src="foursquare/js/jquery-latest.min.js" type="text/javascript"></script>

</head>





<style>

html { 
  background:url("foursquare/Img/background/background") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 
}

@import url("http://fonts.googleapis.com/css?family=Sniglet");


body 
	font-family: Sniglet;
}
h1 {
	font-size: 24px; font-weight: normal;
	background: hsl(120, 40%, 95%); color: hsl(120, 40%, 40%);
	text-align: center; 
	padding: 20px 0; margin-bottom: 40px;
}
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: local('Raleway'), url(foursquare/font/IczWvq5y_Cwwv_rBjOtT0w.woff  ) format('woff');
}

#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu{
	
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
  
}
#cssmenu #menu-button {
  display: none;
  
}
#cssmenu {
  width: auto;
  font-family: Raleway, sans-serif;
  line-height: 1;
  
  
}
#cssmenu > ul {
  background: #0099cc;
  background:#28281E;
}
#cssmenu > ul > li {
  float: left;
  -webkit-perspective: 1000px;
  -moz-perspective: 1000px;
  perspective: 1000px;
  
}
#cssmenu > ul > li > a {
  padding: 16px 20px;
  font-size: 14px;
  color: #ffffff;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  background: #0099cc;
  background:#28281E;
  -webkit-transition: all .3s;
  -moz-transition: all .3s;
  -o-transition: all .3s;
  transition: all .3s;
  -webkit-transform-origin: 50% 0;
  -moz-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
#cssmenu > ul > li.active > a {
  color: white;
  font-weight: bold;
  background: #19799f;
  
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li > a:hover {
  color: #dff2fa;
  -webkit-transform: rotateX(90deg) translateY(-23px);
  -moz-transform: rotateX(90deg) translateY(-23px);
  transform: rotateX(90deg) translateY(-23px);
  -ms-transform: none;
}
#cssmenu > ul > li > a:before {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: -1;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  padding: 16px 20px;
  color: #dff2fa;
  background: #216369;
  content: attr(data-title);
  -webkit-transition: background 0.3s;
  -moz-transition: background 0.3s;
  transition: background 0.3s;
  -webkit-transform: rotateX(-90deg);
  -moz-transform: rotateX(-90deg);
  transform: rotateX(-90deg);
  -webkit-transform-origin: 50% 0;
  -moz-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -ms-transform: translateY(- -18px);
}
/*
#cssmenu > ul > li:hover > a::before,
#cssmenu > ul > li > a:hover::before {
  background: #3db2e1;
}
*/

</style>

<body>
<div id='cssmenu'>
		<ul>
  			 <li><a href='homepage.php'>Home Page</a></li>
  			 <li><a href='Profile.php'>Profile</a></li>
  			 <li><a href='SMessages.php'>Messages</a></li>
  			 <li class='active'><a href='Friends'>Firends</a></li>
   			 <li><a href='Setting'>Account</a></li>
   			 <li><a href='Setting'>Setting</a></li>
  			 <li><a href='About'>About</a></li>
  			 <li><a href='login'>logout</a></li>
		</ul>
</div><br>


<style>
	
#bg{
	background:#28281E;
	float:left;
	width: 952px;
	height:415px;
	padding-left:3px;
	padding-top: 3px;
	padding-right: 3px;
	padding-bottom:20px;
	margin:0 35px;
	border-bottom-left-radius:40px;
	border-bottom-right-radius:40px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	box-shadow: 0 30px 50px 0px rgba(0, 0, 0, 0.75);
}

.Bg1{
	
	width: 950px;
	height: 350px;
	overflow: hidden;
}
.Bg2{
	width:100px ;
	height: 100px;
}
.Bg3{
	width:300px;
	text-align:center;
	position:relative;
	padding:10px;
	margin:-156px 150px;
	color: white ;
	font-family:Helvetica;
	font-size:1.9em;
	font-weight: bold;
	
}
.Img{
	margin-top: -240px;
	width: 950px;
	height: 720px;
	position:relative;
	
}
.Img1{
	width: 150px;
	height: 150px;
	position:relative;
	border-radius: 50%;
	border:5px;
	border-color: white;
	border-radius: 50%;
	margin-top:-80px;
	margin-left:20px;
	z-index:10;
	box-shadow: 20px 20px 80px 0px rgba(0, 0, 0, 1.751);
}
img:hover {
	border-radius: 30px;
	-webkit-filter: brightness(0.35) blur(0.5px);
	filter: brightness(0.35) blur(0.5px);
}
#Name{
	text-decoration:none;
	color: #ffffff;
	pointer:none;
	z-index: 1;
	padding: 5px 9px;
	background: rgba(0, 0, 0, 0.6);
	z-index:10;
	box-shadow: 25px 20px 50px 0px rgba(0, 0, 0, 1.751);
}
#Name:hover{
	text-decoration:underline;
 	color:	#1919FF;
	cursor: pointer;
}
</style>
<form id="form1" action="Account.php" method="post"></form>
<div id="bg" id="brightness">
	<div class="Bg1"><a href="foursquare/Img/Profile/BPIC/<?php echo $BIMG; ?>" ><img src="foursquare/Img/Profile/BPIC/<?php echo $BIMG; ?>"  class="Img" /></a></div>
	<div class="Bg2"><a href="foursquare/Img/Profile/PIC/<?php echo $PIMG; ?>" ><img src="foursquare/Img/Profile/PIC/<?php echo $PIMG; ?>" class="Img1" /></a></div>
	<div class="Bg3"><a href="profile.php" id="Name"><?php echo"$FName $LName"; ?></a></div>

</div>	
	<style>
	
		ul.M{
			float:left;
			position: relative;
			margin-left:200px;
			margin-top:-80px;
			list-style: none;
			height: 50px;
			width: 720px;
			background:#28281E;
		}
		ul li.M{
			float :left;
			padding: 15px;
			color: #eeeeee;
 			font-size: 15px;
 			
		}
		ul li.M1{margin-left: 25px;}
		ul li.M2{margin-left: 48px;}
		ul li.M3{margin-left: 65px;}
		ul li.M4{margin-left: 70px;}
		ul li.M5{margin-left: 30px;}
		ul li.M:hover{
  			background: #0f71ba;
  			background: -moz-linear-gradient(top, #3fa4f0 0%, #0f71ba 100%);
  			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3fa4f0), color-stop(100%, #0f71ba));
 			background: -webkit-linear-gradient(top, #3fa4f0 0%, #0f71ba 100%);
  			background: -o-linear-gradient(top, #3fa4f0 0%, #0f71ba 100%);
 			background: -ms-linear-gradient(top, #3fa4f0 0%, #0f71ba 100%);
 			background: linear-gradient(to bottom, #3fa4f0 0%, #0f71ba 100%);
 		}
		a{
			text-decoration: none;
		}
		span.M{
			 font-family: Raleway, sans-serif;
			 color:white;
		}
		
		table td.MA{
			float :center;
			padding: 4px;
			color: #eeeeee;
 			font-size: 15px;
			text-align:center;
		}
		table td.MA{width: 100px;}
		
		table.MA{
			
			float:left;
			position: relative;
			height: 25px;
			width: 710px;
			border-bottom-right-radius:40px;
		}
	</style>
<ul class="M">
		<li class="M M1"><a href="SMessages.php"><span class="M">Messages</span></a></li>
		<li class="M M2"><a href="Friends.php"><span class="M">Friends</span></a></li>
		<li class="M M3"><a href="Posts.php"><span class="M">Posts</span></a></li>
		<li class="M M4"><a href="Thanks.php"><span class="M">Thanks</span></a></li>
		<li class="M M5"><a href="WMovies.php"><span class="M">Movies Watched</span></a></li>
<table class="MA"><tr class="MA">
		
		<td class="MA"><span class="M"><?php echo "$Messages";  ?></span></td>
		<td class="MA"><span class="M"><?php echo "$Friends";  ?></span></td>
		<td class="MA"><span class="M"><?php echo "$Posts";  ?></span></td>
		<td class="MA"><span class="M"><?php echo "$Thanks";  ?></span></td>
		<td class="MA"><span class="M"><?php echo "$MoviesW";  ?></span></td>
		
		</tr>
</table>
</ul>
	
	
<style>

.New{
	position: absolute;
	background:#28281E;
	margin-left:1000px;
	height:440px;
	width: 245px;
	border-radius:50px;
}
.New1{
	
	margin-top:1.5px;
	margin-left:1.5px;
	background:gray;
	padding:6px;
	height:205px;
	width: 230px;
	border-radius:50px;
	
}
.New2{
	height:205px;
	width: 230px;
	border-radius:50px;
	
}
.New3:hover{
	
	visibility: visible;
	-webkit-filter: brightness(0.35);
	filter:brightness(0.35);
	-webkit-transition:  1s;
	transition: 1s;
}
.New2:hover + .New3{
	opacity:0.1;
	-webkit-filter: brightness(0.35);
	filter:brightness(0.35);
	-webkit-transition:  1s;
	transition: 1s;
	visibility: visible;
}
.New3{
	background:lightgray;

	
	height:60px;
	width: 240px;
	margin-top:-75px;
	margin-left:-5px;
	border-bottom-right-radius:40px; 
	border-bottom-left-radius: 40px;
	position: relative;
	text-align:center;
	visibility: hidden;
	
}
.New4{
	
	
	height:205px;
	width: 230px;
	border-radius:50px;
}
.P1{
	text-align:center;
	padding:21px;
}
</style>

<div class="New">
	<div class="New1">
		<div class="New2"><a href=""><img src="FourSquare/Img/New1/1" class="New4"/></a></div>
		<div class="New3"><a href=""><p class="P1"> New Movie </p></a></div>
	</div>
	<div class="New1">
		<div class="New2"><a href=""><img src="FourSquare/Img/New1/2" class="New4"/></a></div>
		<div class="New3"><a href=""><p class="P1"> Watch The Crysis </p></a></div>
	</div>
</div>


</br></br></br>





<style>
.Bgm{
	border:0px;
	float:none;
	background:#28281E;
	width: 1210px;
	height:initial;
	margin: 0px 22px;
	padding: 10px;
	box-shadow: 0 50px 100px 0px rgba(0, 0, 0, 1.751);
	border-radius: 40px;
}
.Bgm1{
	width: 350px;
	width: initial;
	height: initial;
	padding:6px;
	float:left;
	margin-top: 5px;
	border-radius: 50px;
}
.Bgm4{
	background: #3A5795;
	width: auto;
	height: initial;
	padding:10px;
	float:left;
	margin-top: 5px;
	margin: 5px;
	border-radius: 50px;
	box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.75);
}
.Bgm5{
	float:left;
	width: 50px;
	height: 50px;
	position:absolute;
	margin: 8px 20px;
	border-radius: 50px;
}
.Bgm7{
	float:left;
	width: 50px;
	height: 50px;
	border-radius: 50px;
	box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
}
.Bgm7:hover{
	border-radius: 30px;
	
}
.Bgm8{
	background: gray;
	width: auto;
	height: auto;
	border-radius: 50px;
	padding:10px;
	margin: 50px 350px;
}
.Bgm9{
	height:35px;
	width: 1005px;
	height: auto;
	border-radius: 50px;
	padding: 15px;
	box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
	text-align: center;
}
.Bgm10{
	background:#28281E;
	border:0px;
	float: none;
	width: 1210px;
	height:initial;
	margin-top: 420px;
	margin-left:30px;
	margin-bottom: 50px;
	padding: 10px;
	box-shadow: -15px 15px 30px 15px rgba(0, 0, 0, 0.75);
	border-radius: 40px;
}
.Bgm11{
	width: auto;
	height:50px;
	border-radius: 40px;
	margin-top:-10px;
	float:left;
	box-shadow: 5px 0px 220px 0px rgba(0, 0, 0, 0.75);
	padding:15px;
}
.Bgm12{
	border:0px;
	width: auto;
	height:initial;
	padding: 5px;
	border-radius: 40px;
	
}
.Bgm14{
	width: 20px;
	height:35px;
	float:left;
	border-radius: 50px;
	margin-top:-2px;
	margin-left:7px;
	box-shadow: 5px 0px 220px 0px rgba(0, 0, 0, 0.75);
	padding:15px;
}

.Bgm14:hover{
	background:green;
}
a{
	cursor: pointer;
}
p{
	cursor: default ;
	text-align:center;
}
p.P{
	font: arial;
	text-align:Center;
	margin-right:30px;
	margin-left:60px;
}
p.H{
	font: Raavi;
	text-align:Center;
	font-size:30px;
	color: lightblue;
	
}
.Sel{
	width:850px;
	height:35px;
	border-radius: 50px;
}
.Sel1{
	width:170px;
	height: 50px;
	border-radius: 50px;
	float:left;
	margin-left:1050px;
}
input:focus, textarea:focus{
	background-color:#e5fff3;
}
.IMG3{
	width: 40px;
	height: 45px;
	margin-left:-10px;
	margin-top:-5px;
}
.IMG3:hover + .Bgm14 {
	background:green;
}
</style>

<fieldset class="Bgm10">
<form method="get" class="flp" action="FindF" >
			<div><input type="text"  name="Search"   class="Bgm9" id="Find" value="<?php echo $FUName1; ?>"  /><label for="Find"> Find Friends By User Name Or Email </label></div>
			<input type='submit' value='Add Friends' class='Sel1'  />
			</form>
</fieldset>





<?php

echo "<p class= 'H' >Users</p>";
if ($FUName1 != '') {
	


echo" <fieldset class='Bgm'>";


$Conn4= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
$Dbase4 =@mysql_select_db('foursquare',$Conn4) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write4= "select * from Uaccounts where UName like '%$FUName1%'";
$Result4 =@mysql_query($Write4,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
		if(mysql_num_rows($Result4) > 0){
		while ($Mes= mysql_fetch_array($Result4)) {
			 
$Write4= "select * from accounts where UName like '%$FUName1%' and ID != $ID";
$Result4 =@mysql_query($Write4,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());

	while ($Mes1= mysql_fetch_array($Result4)) {
		$TID = $Mes1[ID]; 
		$Write5= "select * from Friends where (Fid = $ID and TID = $TID ) or (TID = $ID and FID = $TID) ";
		$Result5 =@mysql_query($Write5,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
	if(mysql_num_rows($Result5) > 0){
			echo"
		
				<div class='Bgm4'>
						<div class='Bgm5'><a href='FourSquare/Img/profile/PIC/".$Mes1['PIMG']."'>
									<img src='FourSquare/Img/profile/PIC/".$Mes1['PIMG']."' class='Bgm7'/></a>
						</div>
						<div class='Bgm12'>
							<div class='Bgm11'><p class='P'>".$Mes1['UName']." </p></div>
							<div class='Bgm14'><a href='Friends.php'><img src='Foursquare/IMG/Icons/RF' title='Add Friend' alt='Add Friend' class='IMG3'/></a></div>
						</div>
				</div>
			";
	}else{
				
			$AF1 = $Mes1['UName'];
			$FUI = $Mes1['ID'];	
			$FUP = $Mes1['PIMG'];	
			echo"
				<div class='Bgm4'>
						<div class='Bgm5'><a href='FourSquare/Img/profile/PIC/".$Mes1['PIMG']."'>
									<img src='FourSquare/Img/profile/PIC/".$Mes1['PIMG']."' class='Bgm7'/></a>
						</div>
						<div class='Bgm12'>
							<div class='Bgm11'><p class='P'>".$Mes1['UName']." </p></div>
							<div class='Bgm14'><a href='Friends.php?FUN=$AF1&&FUI=$FUI&&FUP=$FUP'><img src='Foursquare/IMG/Icons/AddF' title='Add Friend' alt='Add Friend' class='IMG3'/></a></div>
						</div>
				</div>
			";
		}
}}}
	else {echo "<div class='Bgm8'><p>Sorry There's No User By This Name</p></div>";}

echo "</fieldset>";}
?>


</body>
<script src="FourSquare/JS/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="FourSquare/JS/jquery.easing.min.js" type="text/javascript"></script>
<script>
$(".flp label").each(function() {
var sop = '<span class="ch">';
var scl = '</span>';
$(this).html(sop + $(this).html().split("").join(scl + sop) + scl);
$(".ch:contains(' ')").html("&nbsp;");})
var d;
$(".flp input").focus(function() {var tm = $(this).outerHeight() / 2 * -1 + "px";
$(this).next().addClass("focussed").children().stop(true).each(function(i) {d = i * 50;
$(this).delay(d).animate({top : tm}, 200, 'easeOutBack');})})
$(".flp input").blur(function() {
if ($(this).val() == "") {
$(this).next().removeClass("focussed").children().stop(true).each(function(i) {d = i * 50;$(this).delay(d).animate({top : 0}, 500, 'easeInOutBack');})}})
</script>
<style>
.flp div {position: absolute; margin-bottom: 30px;}
.flp label {position: absolute; left: 20px; top: 5px;padding: 10px 8px;border-color: transparent; color: #666;cursor: text;}
.ch {display: block; float: left;position: relative;background: white;}
.ch:first-child {padding-left: 2px;}
.ch:last-child {padding-right: 2px;}
.focussed {pointer-events: none;}
</style>
<script>





$(document).ready(function(){ $(".Friends").mouseenter(function(){$(".Friends").css({"background-color": "gray"});});});
$(document).ready(function(){$(".Friends").mouseleave(function(){$(".Friends").css({"background-color": "lightgray"});});});
$(document).ready(function(){ $(".Mesgs").mouseenter(function(){$(".Mesgs").css({"background-color": "gray"});});});
$(document).ready(function(){$(".Mesgs").mouseleave(function(){$(".Mesgs").css({"background-color": "lightgray"});});});
$(document).ready(function(){ $(".Posts").mouseenter(function(){$(".Posts").css({"background-color": "gray"});});});
$(document).ready(function(){$(".Posts").mouseleave(function(){$(".Posts").css({"background-color": "lightgray"});});});
$(document).ready(function(){ $(".Thanks").mouseenter(function(){$(".Thanks").css({"background-color": "gray"});});});
$(document).ready(function(){$(".Thanks").mouseleave(function(){$(".Thanks").css({"background-color": "lightgray"});});});
$(document).ready(function(){ $(".Movie").mouseenter(function(){$(".Movie").css({"background-color": "gray"});});});
$(document).ready(function(){$(".Movie").mouseleave(function(){$(".Movie").css({"background-color": "lightgray"});});});


</script>
</html>
<?php

}}else{
		echo 'Sorry Wrong User Name Or Password';}




?>