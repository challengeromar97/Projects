<?php

$FName = $_POST['FName'];
$LName = $_POST['LName'];
$UName = $_POST['UName'];
$Password = $_POST['Pass'];
$Email = $_POST['Email'];
$Birthday = $_POST['Year']."-".$_POST['Month']."-".$_POST['Day'];
$AEmail = $_POST['AEmail'];
$PNumber = $_POST['PNumber'];
$ZCode = $_POST['ZCode'];
$SQuestion = $_POST['SQuestion'];
$SAnswer = $_POST['SAnswer'];
$Sex = $_POST['Sex' ];

if ($_POST['UName'] == "") {
	echo "Please Sign In first 
	<html>
	
	<meta http-equiv='Refresh' content='3; url= CreateAnAccount.php'>
	</html>";
}
else{
		
$Conn2= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());

$Dbase2 =@mysql_select_db('foursquare',$Conn2) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write2= "select * from uaccounts where UName = '$UName'";
$Result2 =@mysql_query($Write2,$Conn2) or die ('Problem In The Values That Need to Write In Table ' .mysql_error());
$Write3 = "select * from accounts where UName = '$UName'";
$Result3= @mysql_query($Write3,$Conn2) or die ('Problem In The Values That Need to Write In Table ' .mysql_error());
if (mysql_num_rows($Result2) > 0 ) {
	echo 'Sorry This User has Been Used';}
if ( mysql_num_rows($Result3) > 0) {
	echo 'Sorrry this User Cant Be Used Bec it  was deleted';

}else{


	

	$Conn= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
	$Dbase =@mysql_select_db('foursquare',$Conn) or die('Problem In Table Inside The Data Base '.mysql_error());
	$Write = "insert into Accounts values ( '','$FName','$LName','$UName','$Password','$Email','$Birthday','$AEmail','$PNumber','$ZCode','$SQuestion','$SAnswer','$Sex',now(),now(),'0','0','0','0','0','0','0')";
	$Result =@mysql_query($Write,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
	$Write1 = "insert into uaccounts values ( '','$UName','$Password','$Email',now())";
	$Result1 =@mysql_query($Write1,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
	
	echo "
	<html>
	
	<meta http-equiv='Refresh' content='2; url= Login.php'>
	<style>
	div.Thank{
	float:left;
	margin-left:50px;
	}
	div.Thank2{

	color:#464E54;
	font-size:20px ;
	}

	div.Thank3{
	float:center;
	margin-top:25px;
	margin-bottom:30px;
	margin-right:30px;
	margin-left:30px;
	}
	table.T1{
	margin-top:150px;
	margin-left:150px;
	}
	table, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 15px;
	}

	</style>
	<body style='background-color:white'>
	



	<h2>Wait 10 secound</h2>
	<table class='T1'>
	<tr>
	<td>
	<center>
	<div class='Thank3'>
	<div class='Thank'>
	<strong><font color='#464E54' font-family='Arial, Helvetica, sans-serif' size='5'> Thank you <font color='#0d73f9''>$UName</font> for signing up for our mailing list.</font></strong>
	</div></br></br></br>
	<center>
	<div class='Thank2'>A confirmation message has been sent to you with a link you must click on in order to 	</br>
	begin to receive the information.													</br></br>

	Open your email inbox and look for a message from newsletter@example.com 									</br>
	with the subject 'Please confirm your subscription'.										</br></br>

	If you don't, you will not receive the free download information you've signed up for!						</br></br>
	If you come up with any questions please don't hesitate to contact us.
	</center></center> </div>
	<div></center>
	</td>
	</tr>
	</table>
	</body>
	</html>

	</br>

	";

}
}
/*
foreach ($_POST as $key => $value) {
echo
"
<table border='1' style='solid black;border-collapse: collapse;padding: 5px;margin-left:350px;'>
	<tr>
		<td style='text-align: center;border: 1px solid black;border-collapse: collapse;font-size:25px;	background-color:lightgray;width:300px;'> $key</td>
		<td style='text-align: center;border: 1px solid black;border-collapse: collapse;font-size:25px;	background-color:lightgray;width:300px;'> $value</td>
	</tr></br>
</table>
";
}

$Name = $_POST['UName'];
if (!file_exists('FourSquare/Users')) {mkdir('FourSquare/Users');}
$OUsers= fopen("FourSquare/Users/$UName.txt", 'a+');
$WUsers= fwrite($OUsers,
	 "
	 First Name =            ".$_POST['FName']."
	 Last Name =             ".$_POST['LName']."
	 User Name =             ".$_POST['UName']."
	 Password =              ".$_POST['Password']."
	 Email =                 ".$_POST['Email']."
	 Birthday =              ".$_POST['Day']."-".$_POST['Month']."-".$_POST['Year']."
	 Alternative Email =     ".$_POST['AEmail']."
	 Phone Number =          ".$_POST['PNumber']."
	 Zip Code =              ".$_POST['ZCode']."
	 Secret Question =       ".$_POST['SQuestion']."
	 Secret Answer =         ".$_POST['SAnswer']."
	 Sex =                   ".$_POST['Sex']."
	 ");
if ($WUsers) {echo "</br> Your Account Has Been Saved In Note Pad </br>";}
fclose($OUsers);
$ReadIt = fopen("FourSquare/Users/$UName.txt", "r") or die("Unable to open file!");
while (!feof($ReadIt)) {echo fgets($ReadIt) . "<br>";}
fclose($ReadIt);
		
*/		