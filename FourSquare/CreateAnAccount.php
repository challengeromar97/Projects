<html>
<script src="FourSquare/JS/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="FourSquare/JS/jquery.easing.min.js" type="text/javascript"></script>

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
	
	
	
#form1 .Next, #form1 .Prev,#form1 .Signup{
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
#form1 .Next:hover ,.Prev:hover,.Prev:focus, .Next:focus,.Signup :focus,.Signup:hover {
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
#T1 {
	margin-bottom:30px;
	overflow: hidden;
	counter-reset: step;
	}
#T1 li {
	list-style-type: none;
	color: white;
	text-transform:uppercase;
	font-size:9px;
	width: 33.33%;
	float:left;	
	position:relative;
	}
#T1 li:before{
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height:20px;
	display: block;
	font-size:10px;
	color:#333;
	background:white;
	border-radius:3px;
	margin:0 auto 10px auto;
	}
#T1 li:after{
	content: '';
	width:100%;
	background:white;
	height:2px;
	position:absolute;	
	left:-50%;
	top:9px;
	z-index: -1;
	}
#T1 li:first-child:after{
	content:none;
	}
#T1 li.active:before,#T1 li.active:after{
	background:#27AE60;
	color:white;	
	}
	select.UDay{width: 70px;}
	select.UMonth{width: 100px;margin-right:0px;}
	select.UYear{width: 80px;}
	select.UDay,.UMonth,.UYear {
		padding-top: 15px;
		padding-left: 5px;
		padding-right: 5px;
		padding-bottom: 15px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size:11px;
	}
	select.SQuestion{
		font-size: 16.7px;
		margin-top: 0px;
		padding-top: 3px;
		padding-left: 3px;
		padding-right: 3px;
		padding-bottom: 5px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size:13px;
		height: 43px;
		width: 260px;
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
<script type="text/javascript">
	function CForm(form) {
		if (form.UName.value == "") {alert("Please Enter Your User Name");form.UName.focus();return false;}
		if (form.UName.value.length < 3) {alert("Sorry Your User Name Must More Than 3 or Equal 3");form.UName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.UName.value)) {alert("Your User Name Contain Unknown Characters");form.UName.focus();return false;}
		
		if (form.Pass.value == "") {alert("Please Enter Your Password");form.Pass.focus();return false;}
		if (form.Pass.value.length < 8) {alert("Sorry Your Password Must More Than 8 or Equal 8");form.Pass.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.Pass.value)) {alert("Your User Password Contain Unknown Characters");form.Pass.focus();return false;}
		if (form.Pass.value == form.FName.value) {alert("You Cant Use Your Password in Your First Name");form.Pass.focus();return false;}
		if (form.Pass.value == form.LName.value) {alert("You Cant Use Your Password in Your Last Name");form.Pass.focus();return false;}
		if (form.Pass.value == form.UName.value) {alert("You Cant Use Your Password in Your User Name");form.Pass.focus();return false;}

		if (form.CPass.value == "") {alert("Please Enter Your Confirm Password");form.CPass.focus();return false;}
		if (form.CPass.value != form.Pass.value) {alert("Your Password Doesnt Match");form.Pass.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.CPass.value)) {alert("Your Confrim Password Dosent Match Your Password");form.CPass.focus();return false;}
		
		if (form.Email.value == "") {alert("Please Enter Your Email");form.Email.focus();return false;}

		if (form.FName.value == "" ) {alert("Please Enter Your First Name");form.FName.focus();return false;}
		if (form.FName.value.length < 3) {alert("Sorry Your First Name Must More Than 3 or Equal 3");form.FName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.FName.value)) {alert("Your First Name Must Be Letters And Number And UnderScore Only");form.FName.focus();return false;}
		if (form.FName.value == form.LName.value) {alert("Sorry You Cant Use Your First Name in Last Name");form.FName.focus();return false;}

		if (form.LName.value == "") {alert("Please Enter Your Last Name");form.LName.focus();return false;}
		if (form.LName.value.length < 3) {alert("Sorry Your Last Name Must More Than 3 or Equal 3");form.LName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.LName.value)) {alert("Your Last Name Must Be Letters And Number And UnderScore Only");form.LName.focus();return false;}

		if (form.Day.value == "0") {alert("Please Enter Your Date");form.Day.focus();return false;}
		if (form.Month.value == "0") {alert("Please Enter Your Month");form.Month.focus();return false;}
		if (form.Year.value == "0") {alert("Please Enter Your Year");form.Year.focus();return false;}

		if (form.AEmail.value == form.Email.value) {alert("Your Email Cant Use In Alternative Email");form.AEmail.focus();return false;}
		if (form.AEmail.value == "") {alert("Please Enter Your Alternative Email");form.AEmail.focus();return false;}

		if (form.PNumber.value == "") {alert("Please Enter Your Phone Number");form.PNumber.focus();return false;}
		if (form.PNumber.value.length < 11) {alert("Please Enter Your Correct Number");form.PNumber.focus();return false;}

		if (form.ZCode.value == "") {alert("Please Enter Your Zip Code");form.ZCode.focus();return false;}

		if (form.SQuestion.value == "0") {alert("Please Choose Your Question");form.SQuestion.focus();return false;}

		if (form.SAnswer.value == "") {alert("Please Enter Your Answer");form.SAnswer.focus();return false;}
		if (form.SAnswer.value.length < 5) {alert("Sorry Your Answer Must More Than 5 or Equal 5");form.SAnswer.focus();return false;}
		if (form.SAnswer.value == form.FName.value) {alert("You Cant Use Your Name In Answer");form.SAnswer.focus();return false;}
		if (form.SAnswer.value == form.LName.value) {alert("You Cant Use Your Name In Answer");form.SAnswer.focus();return false;}
		if (form.SAnswer.value == form.UName.value) {alert("You Cant Use Your Name In Answer");form.SAnswer.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.SAnswer.value)) {alert("Your Answer Contain Unknown Characters");form.SAnswer.focus();return false;}
		var x = document.getElementById("Con").checked;
		if( x == false ){alert('Sorry Please Read Terms & Condition And Agree');return false;}
		 
   			
	}
</script>




<body>


	<form action="Signup.php" method="post" id="form1" class="flp" onsubmit="return CForm(this);" >
		
			<ul id="T1">
				<li class="active">Basic Information</li>
				<li>Personal Details</li>
				<li>Security Information</li>
			</ul>

			<fieldset>
				<h2 id="T2">Create Your Account</h2>
				
				<div><input type="text" 	name="UName" class="Text" id="Uname" autocomplete="off" /><label for="Uname">User Name</label></div>
				<div><input type="password" name="Pass"  class="Text" id="Password" autocomplete="off" /><label for="Password">Password</label></div>
				<div><input type="password"	name="CPass" class="Text" id="CPassword" autocomplete="off" //><label for="CPassword">Confirm Password</label></div>
				<div><input type="email" 	name="Email" class="Text" id="Email"  autocomplete="off" //><label for="Email">Email</label></div>
				<input type="button" 		name="Next"  class="Next" value="Next" /><br /><br />
				<h3 id="ST1">Or You Already Have Account <a href="Login.php">Log In</a></h3>
			</fieldset>
			<fieldset>
				<h2 id="T2">Create Your Profile</h2>
				<div><input type="text" name="FName" class="Text" id="FName" autocomplete="off" //><label for="FName">First Name</label></div>
				<div><input type="text" name="LName" class="Text" id="LName" autocomplete="off" //><label for="LName">Last Name</label></div>
				<div>
					<select name="Day" title="Day" form="form1" class="UDay" autocomplete="off" id='Pad' id="Day" ><option value='0' selected="1" >Day</option>
							<?php for ($i=1; $i < 32 ; $i++) {echo"<option value=\"$i\">$i</option>";}?>
					</select>
					<select name="Month" title="Month" class="UMonth" autocomplete="off" id='Pad' id="Month">
						<option value='0' selected="1" >Month</option><option value='1'>January</option><option value='2'>February</option>
						<option value='3'>May</option>		 <option value='4'>April</option>   <option value='5'>May</option><option value='6'>June</option>
						<option value='7'>Jul</option>		 <option value='8'>Aug</option>  	<option value='9'>September</option>
						<option value='10'>Oct</option>		 <option value='11'>Nov</option> 	<option value='12'>December</option>
					</select>
					<select name="Year" title="Year" class="UYear" autocomplete="off" id='Pad' id="Year"><option value="0" selected="1">Year</option>
							<?php for ($i=2015; $i >1905 ; $i--) {echo"<option value=\"$i\">$i</option>";}?>
					</select>
					
				</div><br />
				<input type="radio" name="Sex" value="Male" checked=""/>Male
				<input type="radio" hidden/>
				<input type="radio" name="Sex" value="FMale" />Female</br><br />
				<input type="button" name="Prev" class="Prev" value="Previous" />
				<input type="text" name="" hidden/>
				<input type="button"name="Next" class="Next" value="Next" /><br /><br />
				<h3 id="ST1">Or You Already Have Account <a href="Login.php">Log In</a></h3>
			</fieldset>
			<fieldset>
				<h2 id="T2">Your Secrets Answer</h2>
				<div><input type="email"   class="Text" name="AEmail" id="AEmail" autocomplete="off" //><label for="AEmail">Alternative Email</label></div>
				<div><input type="tel"	   class="Text" name="PNumber" id="PNumber" autocomplete="off" //><label for="PNumber">Phone Number</label></div>
				<div><input type="Zip Code"class="Text" name="Zcode"   id="ZCode" autocomplete="off" //><label for="ZCode">Zip Code</label></div>
				<div>
					<select name="SQuestion" class="SQuestion"  id="Pad" />
						<option value="0">Choose A Secrite Question</option>
						<option value="1">What is the last name of the teacher who gave you your first failing grade?</option>
						<option value="2">What was your favorite place to visit as a child?</option>
						<option value="3">What was the name of your elementary / primary school?</option>
						<option value="4">what city or town did you meet your spouse/partner?</option>
						<option value="5">What was the make and model of your first car?</option>
						<option value="6">What is your favourite hobby?</option>
					</select></div>
				<div><input type="text"	   class="Text" name="SAnswer"  id="SAnswer" autocomplete="off" /><label for="SAnswer">Secret Answer</label></div>
				<input type="button"   class="Prev" name="Prev" value="Previous" />
				<input type="button"   hidden/>
				<input type="submit"   class="Signup"  value="Create" /><br /><br />
				<h3 id="ST1">Or You Already Have Account <a href="Login.php">Log In</a></h3>
			</fieldset>
		</form>







</body>	
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

	



	var Currentfs, Nextfs, Prevfs;
	var left, opacity, scale;
	var animating;

	$(".Next").click(function() {
		if (animating)
			return false;
		animating = true;

		Currentfs = $(this).parent();
		Nextfs = $(this).parent().next();
		$("#T1 li").eq($("fieldset").index(Nextfs)).addClass("active");
		Nextfs.show();
		Currentfs.animate({
			opacity : 0
		}, {
			step : function(now, mx) {
				scale = 1 - (1 - now) * 0.2;
				left = (now * 50) + "%";
				opacity = 1 - now;
				Currentfs.css({
					'transform' : 'scale(' + scale + ')'
				});
				Nextfs.css({
					'left' : left,
					'opacity' : opacity
				});
			},
			duration : 800,
			complete : function() {
				Currentfs.hide();
				animating = false;
			},
			easing : 'easeInOutBack'
		});
	});

	$(".Prev").click(function() {
		if (animating)
			return false;
		animating = true;

		Currentfs = $(this).parent();
		Prevfs = $(this).parent().prev();

		$("#T1 li").eq($("fieldset").index(Currentfs)).removeClass("active");

		Prevfs.show();
		Currentfs.animate({
			opacity : 0
		}, {
			step : function(now, mx) {
				scale = 0.8 + (1 - now) * 0.2;
				left = ((1 - now) * 50) + "%";
				opacity = 1 - now;
				Currentfs.css({
					'left' : left
				});
				Prevfs.css({
					'transform' : 'scale(' + scale + ')',
					'opacity' : opacity
				});
			},
			duration : 800,
			complete : function() {
				Currentfs.hide();
				animating = false;
			},
			easing : 'easeInOutBack'
		});
	});


</script>
	
	
	

	
</html>
