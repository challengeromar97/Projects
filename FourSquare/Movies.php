

<!DOCTYPE html>
<html lang="en_US">
	
	<head>
		<title>Create A New Account</title>
	</head>
	
<style>
	a {
		text-decoration: none;
		color: blue;
	}
	a:hover {
		text-decoration: underline;
	}
	a:visited {
		color: blue;
	}
	a:active {
		color: red;
	}

	div.S1 {
		background-color: #ffffff;
		border-radius: 4px;
		font-family: Helvetica, arial, sans-serif;
		font-weight: bold;
		color: rgb(84, 84, 84);
		display: inline;
		font-size: 35px;
		height: auto;
		width: auto;
	}
	div.S2 {
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
		background-color: rgb(255, 255, 255);
		border-left-color: rgb(229, 229, 229);
		border-right-color: rgb(229, 229, 229);
		border-top-color: rgb(229, 229, 229);
		border-left-style: solid;
		border-top-style: solid;
		border-right-style: solid;
		border-right-width: 1px;
		border-left-width: 1px;
		border-top-width: 1px;
		display: block;
		height: 40px;
		margin-bottom: 25px;
		margin-left: 100px;
		margin-right: 0px;
		margin-top: 110px;
		padding-bottom: 27px;
		padding-left: 27px;
		padding-right: 27px;
		padding-top: 27px;
		width: 669px;
		word-wrap: break-word;
	}
	div.S3 {
		color: rgb(84, 84, 84);
		display: block;
		float: right;
		font-family: Helvetica, arial, sans-serif;
		font-size: 12px;
		height: 42px;
		line-height: 42px;
		width: 190px;
	}
	div.S4 {
		width: 669px;
		height: 1000px;
		padding-left: 27px;
		padding-right: 27px;
		padding-top: 60px;
		margin-bottom: 25px;
		margin-left: 100px;
		padding-bottom: 22px;
		background-color: lightgray;
		border-bottom-color: rgb(229, 229, 229);
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-left-color: rgb(229, 229, 229);
		border-left-style: solid;
		border-left-width: 1px;
		border-right-color: rgb(229, 229, 229);
		border-right-style: solid;
		border-right-width: 1px;
		border-top-color: rgb(229, 229, 229);
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
		border-top-style: solid;
		border-top-width: 1px;
	}
	select.USQuestion {
		height: 43px;
		width: 270px;
	}


		#Pad {
		border-bottom-color: #F6F5F4;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		border-bottom-width: 1px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-left-color: rgb(246, 245, 244);
		border-left-style: solid;
		border-left-width: 1px;
		border-right-color: rgb(246, 245, 244);
		border-right-style: solid;
		border-right-width: 1px;
		border-top-color: rgb(246, 245, 244);
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-top-style: solid;
		border-top-width: 1px;
		
	}


	div.D1 {
		float: left;
		margin-left: 0px;
		padding-top: 12px;
		padding-left: 12px;
		padding-right: 12px;
		padding-bottom: 13px;
		text-align:center;
		font-size: .9em;
		font-family: Helvetica, arial, sans-serif;
		color: rgb(84, 84, 84);
	}
	div.D12 {
		float: left;
		margin-left: 0px;
		padding-top: 2px;
		padding-left: 2px;
		padding-right: 2px;
		padding-bottom: 5.3px;
		width:85px;
		text-align:center;
		font-size: .9em;
		font-family: Helvetica, arial, sans-serif;
		color: rgb(84, 84, 84);
	}
	div.D2 {
		float: left;
		margin-left: 20px;
		
		text-align:center;
		font-size: .9em;
		font-family: Helvetica, arial, sans-serif;
		color: rgb(84, 84, 84);
	}
	div.D3 {
		float: left;
		
	}
	input.I1 {
		cursor: auto;
		height: 19px;
		width: 247px;
		word-spacing: 1px;
		font-size: 16.7px;
		padding-top: 11px;
		padding-left: 11px;
		padding-right: 11px;
		padding-bottom: 12px;
	}
	select.UDay,.UMonth,.UYear,.USQuestion{
		font-size: 16.7px;
		margin-top: 0px;
		padding-top: 3px;
		padding-left: 3px;
		padding-right: 3px;
		padding-bottom: 3px;
	}
	select.UDay {
		height: 43px;
		width: 67px;
	}
	select.UMonth {
		height: 43px;
		width: 112px;
	}
	select.UYear {
		height: 43px;
		width: 83px;
	}
	input.USubmit {
		cursor: auto;
		height: 50px;
		width: 260px;
		word-spacing: 1px;
		font-weight: bold;
		font-size: 16.7px;
		margin-top: -20px;
		padding-top: 11px;
		padding-left: 11px;
		padding-right: 11px;
		padding-bottom: 11px;
	}
	input.USex {
		margin-left: 55px;
		margin-top: 13.5px;
		
	}

</style> 

<script type="text/javascript">
	function CForm(form) {
		if (form.FName.value == "" ) {alert("Please Enter Your First Name");form.FName.focus();return false;}
		if (form.FName.value.length < 3) {alert("Sorry Your First Name Must More Than 3 or Equal 3");form.FName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.FName.value)) {alert("Your First Name Must Be Letters And Number And UnderScore Only");form.FName.focus();return false;}
		if (form.FName.value == form.LName.value) {alert("Sorry You Cant Use Your First Name in Last Name");form.FName.focus();return false;}

		if (form.LName.value == "") {alert("Please Enter Your Last Name");form.LName.focus();return false;}
		if (form.LName.value.length < 3) {alert("Sorry Your Last Name Must More Than 3 or Equal 3");form.LName.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.LName.value)) {alert("Your Last Name Must Be Letters And Number And UnderScore Only");form.LName.focus();return false;}

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

		if (form.CPass.value != form.Pass.value) {alert("Your Password Doesnt Match");form.Pass.focus();return false;}
		if (form.CPass.value == "") {alert("Please Enter Your Confirm Password");form.CPass.focus();return false;}
		re = /^\w+$/;
		if (!re.test(form.CPass.value)) {alert("Your Confrim Password Dosent Match Your Password");form.CPass.focus();return false;}

		if (form.Email.value == "") {alert("Please Enter Your Email");form.Email.focus();return false;}

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

<body style="background-color:#ECEBE8;">




<div class='S2'>
		<div class='S1'>Create Account</div>
		<div class="S3">Already Have An Account? <a href="Login.php">Log in</a>.</div>
</div>
<div class="S4">

<form action="Signup.php" id="form1" method="POST" onsubmit="return CForm(this);"></form>	



<div class="D3">	 
<div class='D1'>First Name</div>
<div class="D2"><input class="I1" form="form1"  type="text" name="FName" id='Pad' autocomplete="off"/></div><br><br>
</div>
</br></br></br>	</br>
	
<div class="D3">
	<div class='D1'> Last Name </div>
	<div class="D2" ><input class="I1" form="form1" type="text" name="LName" id='Pad' autocomplete="off"/></div><br><br>
</div>
</br></br></br></br>
<div class="D3">
	<div class='D1'> Username </div>
	<div class="D2" ><input class="I1" form="form1" type="text" name="UName" id='Pad' autocomplete="off"/></div>	
</div>

</br></br></br></br>
<div class="D3">
	<div class='D1' style="width: 65px;"> Password </div>
	<div class="D2" ><input class="I1" form="form1"  type="password"  name="Pass" id='Pad' autocomplete="off"/></div><br><br>
</div>
</br></br></br></br>

<div class="D3">
	<div class="D12">Confirm <br> Password</div>
	<div class="D2"><input class="I1" form="form1" type="password"  name="CPass"  id='Pad' autocomplete="off"/></div>
</div>
</br></br></br></br>


<div class="D3">
	<div class='D1' style="width: 65px;"> Email </div>
	<div class="D2"><input class="I1" form="form1" type="email" name="Email"  id='Pad'/></div><br><br>
</div>
</br></br></br></br>

<div class="D3">
	<div class="D1" style="width: 65px;"> BirthDay </div>
	<div class="D2" >
		
			<select name="Day" title="Day" form="form1" class="UDay" autocomplete="off" id='Pad' ><option value='0' selected="1" >Day</option>
				<?php for ($i=1; $i < 32 ; $i++) {echo"<option value=\"$i\">$i</option>";}?>
			</select>
			<select name="Month" title="Month" form="form1" class="UMonth" autocomplete="off" id='Pad' >
					<option value='0' selected="1" >Month</option><option value='1'>January</option><option value='2'>February</option>
					<option value='3'>March</option>	<option value='4'>April</option>   <option value='5'>May</option><option value='6'>June</option>
					<option value='7'>July</option>		<option value='8'>August</option>  <option value='9'>September</option>
					<option value='10'>October</option><option value='11'>November</option><option value='12'>December</option>
			</select>
			<select name="Year" title="Year" form="form1" class="UYear" autocomplete="off" id='Pad' >
					<option value="0" selected="1">Year</option>
					<?php for ($i=2015; $i >1905 ; $i--) {echo"<option value=\"$i\">$i</option>";}?>
			</select>
	</div>
</div>
</br></br></br></br>

<div class="D3">
	<div class="D12">Alternative <br> Email</div>
	<div class="D2" ><input class="I1" form="form1" type="email" name="AEmail" id='Pad' /></div><br><br>
</div></br></br></br></br>


<div class="D3">
	<div class='D12'>Phone <br> Number</div>
	<div class="D2" ><input class="I1" type="tel" name="PNumber" form="form1" autocomplete="off" maxlength="20"  id='Pad' onkeypress='return event.charCode >= 48 && event.charCode <= 57'  /></div><br><br>
</div></br></br></br></br>

<div class="D3">
	<div class='D12'> Zip <br> Code</div>
	<div class="D2" ><input type="text" name="ZCode" class="I1"  form="form1" autocomplete="off" maxlength="15"  id='Pad' onkeypress='return event.charCode >= 48 && event.charCode <= 57'  /></div><br><br>
</div></br></br></br></br>

<div class="D3">
	<div class='D12'> Secret <br> Question</div>
	<div class="D2" ><select name="SQuestion" class="USQuestion"  form="form1"  id='Pad' />
		<option value="0">Choose A Secrite Question</option>
		<option value="1">What is the last name of the teacher who gave you your first failing grade?</option>
		<option value="2">What was your favorite place to visit as a child?</option>
		<option value="3">What was the name of your elementary / primary school?</option>
		<option value="4">what city or town did you meet your spouse/partner?</option>
		<option value="5">What was the make and model of your first car?</option>
		<option value="6">What is your favourite hobby?</option>
		</select>
	</div><br><br></br></br>


<div class="D3">
	<div class='D1' style="margin-left: 16px;"> Answer </div>
	<div class="D2" ><input type="text" name="SAnswer" class="I1"  id='Pad' form="form1" maxlength="20" autocomplete="off"  /></div>
</div></br></br></br>

<div class="D3">
	<div class='D1' style="width: 65px;"> Sex </div>
	<div class="D2" >
				<input type="radio" name="Sex" class="USex"  value="Male" form="form1" checked/> Male 
				<input type="radio" name="Sex" class="USex" value="Female" form="form1"  /> Female </div>
				
</div>
</br></br></br>	
<div class='D3'>
	<div style="margin-left: 35px"><input type="checkbox" id="Con" />	I confirm that I agree with terms & conditions</div>

</div>
</br></br></br></br>	
<div class="D3" style="margin-left: 106px;" >
	<div ><input type="submit" name="Sign Up" class="USubmit"  form="form1" value="Sign Up" id="Pad" /></div>
</div>

</br></br></br></br></br></br>
















</body>
</html>