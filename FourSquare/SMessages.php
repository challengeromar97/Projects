<?php

$ID1 = $_COOKIE['Log'];
session_start();
if (isset($_SESSION['ID'])){	
$ID2 = $_SESSION['ID']	;}

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
$BIMG = $User[15];
$PIMG = $User[16];
$Messages = $User[17];
$Friends = $User[18];
$Posts = $User[19];
$Thanks = $User[20];
$MoviesW = $User[21];



?>


<!doctype html>
<html lang=''>
<head>
	<title> Messages </title>
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
  			 <li class='active'><a href='SMessages.php'>Messages</a></li>
  			 <li><a href='Friends'>Firends</a></li>
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
	float:left;
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
	width: 1200px;
	height:initial;
	margin: 0px 30px;
	padding: 10px;
	box-shadow: 0 50px 100px 0px rgba(0, 0, 0, 1.751);
	border-radius: 40px;
}
.Bgm1{
	width: 350px;
	width: initial;
	height: initial;
	padding:2px;
	float:left;
	margin-top: 5px;
	border-radius: 50px;
}
.Bgm2{
	background: lightgray;
	width: 1080px;
	height: 200px;
	padding:20px;
	margin:10px;
	margin-left: 0px;
	border-radius: 50px;
	box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.75);
	resize: none;
}
.Bgm3{
	float:left;
	width: 1130px;
	padding:5px;
	height: initial;
	margin-left: 50px;
	border-radius: 50px;
}
.Bgm4{
	width: 350px;
	background: #3A5795;
	width: 1200px;
	height: initial;
	padding:2px;
	float:left;
	margin-top: 5px;
	border-radius: 50px;
	box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.75);
}
.Bgm5{
	float:left;
	width: 50px;
	height: 50px;
	margin: 2.1px 20px;
	border-radius: 50px;
}
.Bgm6{
	float:left;
	background: gray;
	width: 1100px;
	height: initial;
	margin-bottom:20px;
	margin-left: 80px;
	border-radius: 50px;
	box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.75);
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
	background:#28281E;
	width: 1050px;
	height: auto;
	border-radius: 50px;
	padding:20px;
	margin:0px 77px;
	box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
}
.Bgm10{
	background:#28281E;
	border:0px;
	float: left;
	width: 900px;
	height:initial;
	margin: 0px 30px;
	padding: 10px;
	box-shadow: -15px 15px 30px 15px rgba(0, 0, 0, 0.75);
	border-radius: 40px;
}
.Bgm11{
	width: 200px;
	height:20px;
	border-radius: 40px;
	margin-top:-15px;
	box-shadow: 10px 0px 220px 0px rgba(0, 0, 0, 0.75);
}
.Bgm12{
	border:0px;
	width: 200px;
	height:initial;
	padding: 5px;
	margin:0px 80px;
	border-radius: 40px;
	
}
.Bgm13{
	border:0px;
	width: 900px;
	height:60px;
	border-radius: 40px;
	
}
.Bgm14{
	float:left;
	padding-right: 20px;
	width: 50px;
	height: 50px;
	margin: -6px 0px;
	border-radius: 50px;
}
.Bgm15{
	float:left;
	width: 50px;
	height: 50px;
	margin: 15px 10px;
	border-radius: 50px;
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
	width: 1100px;
	text-align:left;
	
}
.Sel{
	width:850px;
	height:35px;
	border-radius: 50px;
}
.Sel1{
	width:170px;
	height:35px;
	border-radius: 50px;
}
    input:focus, textarea:focus{
background-color:#e5fff3;
}
</style>
<?php

for ($i=0; $i < 25 ; $i++) { echo "<br>";}

	
echo" <fieldset class='Bgm'>";



$Conn4= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
$Dbase4 =@mysql_select_db('foursquare',$Conn4) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write4= "select * from Messagefutu where TID = $ID";
$Result4 =@mysql_query($Write4,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
	if(mysql_num_rows($Result4) > 0){
		while ($Mes= mysql_fetch_array($Result4)) { 
			echo"
		
				<div class='Bgm4'>
					<div class='Bgm13'>
						<div class='Bgm5'><a href='FourSquare/Img/profile/PIC/".$Mes['PID']."'>
									<img src='FourSquare/Img/profile/PIC/".$Mes['PID']."' class='Bgm7'/></a>
						</div>
						<div class='Bgm12'>
							<div class='Bgm11'><p class='P'>".$Mes['FUName']." </p></div>
							<div class='Bgm11'><p class='P'>".$Mes['Time']." </p></div>
						</div>
					</div>
					<div class='Bgm6'>
						<p>".$Mes['Messages']." </p>
					
					</div>
				</div>
		";}
	}
	else {echo "<div class='Bgm8'><p>Sorry There's No Messages Sent To you </p></div>";}

echo "</fieldset>";
?>
<br /><br /><br /><br /><br /><br /><br /><br /><br />

<fieldset class="Bgm10">
<form id='form2' method="post" action="MessageWS.php"></form>

	<div class='Bgm15'><a href=''><img src='FourSquare/Img/profile/PIC/<?php echo $PIMG ?>' class='Bgm7'/></a></div>
						
		<div class='Bgm9'>
			
			<input name="UName" value='<?php echo "$UName"; ?>' form='form2' hidden/>
			<input name="ID" value='<?php echo "$ID"; ?>' form='form2' hidden/>
			<input name="PID" value='<?php echo "$PIMG"; ?>' form='form2' hidden/>
			<Select class='Sel' name="TUID" form='form2'>
				<?php 
					$Conn4= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
					$Dbase4 =@mysql_select_db('foursquare',$Conn4) or die('Problem In Table Inside The Data Base '.mysql_error());
					$Write4= "select * from friends where FID = $ID ";
					$Result4 =@mysql_query($Write4,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
					while ($Mes= mysql_fetch_array($Result4)) {echo"<option value='$Mes[3]'>$Mes[4]</option>";};
					$Write4= "select * from friends where TID = $ID ";
					$Result4 =@mysql_query($Write4,$Conn4) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
					while ($Mes= mysql_fetch_array($Result4)) {echo"<option value='$Mes[1]'>$Mes[2]</option>";};
					
				?>
				
			</Select>
			<input type='submit' value='Send Message' class='Sel1' form='form2'/>
		</div>
	<div class='Bgm1'>
			<div class='Bgm3'><textarea form='form2' name='Mess1' class='Bgm2' required></textarea></div>
	</div>
</fieldset>




<style>
	
	
/*Thumbnail Background*/
.thumb {
	width: 1000px; height: 1000px; ; margin: 70px auto;
	perspective: 1000px;
}
.thumb a {
	display: block; width: 100%; height: 100%;
	/*double layered BG for lighting effect*/
	background: 
		linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
		url("foursquare/Img/Profile/BPIC/1");
	/*disabling the translucent black bg on the main image*/
	background-size: 0, cover;
	/*3d space for children*/
	transform-style: preserve-3d;
	transition: all 0.5s;
}
.thumb:hover a {transform: rotateX(80deg); transform-origin: bottom;}
/*bottom surface */
.thumb a:after {
	/*36px high element positioned at the bottom of the image*/
	content: ''; position: absolute; left: 0; bottom: 0; 
	width: 100%; height: 36px;
	/*inherit the main BG*/
	background: inherit; background-size: cover, cover;
	/*draw the BG bottom up*/
	background-position: bottom;
	/*rotate the surface 90deg on the bottom axis*/
	transform: rotateX(90deg); transform-origin: bottom;
}
/*label style*/
.thumb a span {
	color: white; text-transform: uppercase;
	position: absolute; top: 100%; left: 0; width: 100%;
	font: bold 12px/36px Montserrat; text-align: center;
	/*the rotation is a bit less than the bottom surface to avoid flickering*/
	transform: rotateX(-89.99deg); transform-origin: top;
	z-index: 1;
}
/*shadow*/
.thumb a:before {
	content: ''; position: absolute; top: 0; left: 0;
	width: 100%; height: 100%;
	background: rgba(0, 0, 0, 0.5); 
	box-shadow: 0 0 100px 50px rgba(0, 0, 0, 0.5);
	transition: all 0.5s; 
	/*by default the shadow will be almost flat, very transparent, scaled down with a large blur*/
	opacity: 0.15;
	transform: rotateX(95deg) translateZ(-80px) scale(0.75);
	transform-origin: bottom;
}
.thumb:hover a:before {
	opacity: 1;
	/*blurred effect using box shadow as filter: blur is not supported in all browsers*/
	box-shadow: 0 0 25px 25px rgba(0, 0, 0, 0.5);
	/*pushing the shadow down and scaling it down to size*/
	transform: rotateX(0) translateZ(-60px) scale(0.85);
}

</style>





</body>
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