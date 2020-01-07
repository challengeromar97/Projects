<?php
setcookie("Log",'',time()-1000*1000,"/",null,0);
session_start();
session_destroy();
setcookie(session_name(),session_id(),time()-10000*10,"/",null,0);

?>




<!DOCTYPE html>
<html lang="en-US">
<head>
		<title> Login </title>
</head>



<style>

	
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat-Regular'), url(FourSquare/Font/zhcz-_WihjSQC0oHJ9TCYBsxEYwM7FgeyaSgU71cLG0.woff) format('woff');
}

* {margin: 0; padding: 0;}


html {
	height: 100%;
	background: url('foursquare/Img/background/gs.png');
	background: 
	linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
	url('foursquare/Img/background/gs.png');
	
}

#form1{
	width:400px;
	margin:50px auto;
	text-align:center;
	position: relative;
	font-family: montserrat, arial, verdana;
	}
#form1 fieldset{
	background-color:white;
	border:0px;
	border-radius:3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding:20px 30px;
	width:80%;
	box-sizing: border-box;
	margin: 0 10%;
	position: absolute;
	}
#form1 fieldset:not(:first-of-type){
	display:none;
	}
#form1 input.Text {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size:13px;
	}
	
	
	
#form1 .Next{
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color:white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
	}
#form1 .Next:hover {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
	}


#T2{
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
	}
#ST1 {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
	}

.flp div {position: relative; margin-bottom: 5px;}

 .flp label {
	width: 400px; display: block;
	font: inherit; font-size: 16px; line-height: 24px;
	height: 46px;
	border: 1px solid #999;
}
.flp label {
	position: absolute; left: 0; top: 0;
	padding: 10px 8px;
	border-color: transparent; color: #666;
	cursor: text;
}

.ch {
	display: block; float: left;
	position: relative;
	background: white; 
}
.ch:first-child {padding-left: 2px;}
.ch:last-child {padding-right: 2px;}

.focussed {
	pointer-events: none;
}




</style>



<script src="FourSquare/JS/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="FourSquare/JS/jquery.easing.min.js" type="text/javascript"></script>
<body style="background-color:lightgray; ">



<form action="Profile.php" method="post" id="form1" class="flp" onsubmit="return CForm(this)">

			<fieldset>
				<h2 id="T2">Log In </h2>
				<h3 id="ST1">Please Enter Your User & Pass</h3>
				<div><input type="text" 	name="UName" class="Text" id="Uname" 	autocomplete="off" form = 'form1' /><label for="Uname">User Name Or Email</label></div>
				<div><input type="password" name="Pass"  class="Text" id="Password" autocomplete="off" form = 'form1' /><label for="Password">Password</label></div>
				<input type="checkbox" name="Rem" value="1" />Remember Me</br></br>
				<input type="checkbox" name="Dont" value="2" checked="" hidden/>
				<a href="CreateAnAccount.php">Or Create A New Account</a></br></br>
				<input type="submit" 		name="Next"  class="Next" value="Submit" />

			</fieldset>


</form>



<script>
	
	function CForm(form) {
		if (form.UName.value == "") {alert("Please Enter Your User Name");form.UName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.UName.value)) {alert("Your User Name Contain Unknown Characters");form.UName.focus();return false;}
		if (form.Pass.value == "") {alert("Please Enter Your Password");form.Pass.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.Pass.value)) {alert("Your User Password Contain Unknown Characters");form.Pass.focus();return false;}
		if (form.Pass.value == form.UName.value) {alert("You Cant Use Your Password in Your User Name");form.Pass.focus();return false;}
	}
	
	
</script>






















<script>
	
	$(".flp label").each(function() {
		var sop = '<span class="ch">';
		var scl = '</span>';
		$(this).html(sop + $(this).html().split("").join(scl + sop) + scl);
		$(".ch:contains(' ')").html("&nbsp;");
	})
	var d;
	$(".flp input").focus(function() {
		var tm = $(this).outerHeight() / 2 * -1 + "px";
		$(this).next().addClass("focussed").children().stop(true).each(function(i) {
			d = i * 50;
			$(this).delay(d).animate({
				top : tm
			}, 200, 'easeOutBack');
		})
	})
	$(".flp input").blur(function() {
		if ($(this).val() == "") {
			$(this).next().removeClass("focussed").children().stop(true).each(function(i) {
				d = i * 50;
				$(this).delay(d).animate({
					top : 0
				}, 500, 'easeInOutBack');
			})
		}
	})

	
</script>

</body>

</html>

