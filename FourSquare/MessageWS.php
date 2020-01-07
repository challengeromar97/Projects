<html>

<body><p>The Message Was Sent Sucessfully</p>
<?php

$FUName = $_POST[UName];
$ID= $_POST[ID];
$Message =$_POST[Mess1];
$TUID = $_POST[TUID];
$PID = $_POST[PID];


if ($_POST['UName'] == '') {
	echo"Please Enter Your User First";
	echo "<meta http-equiv='Refresh' content='3; url= SMessages.php'>";
}
if ($_POST['Mess1'] == ''){echo "There's No Message";
	echo "<meta http-equiv='Refresh' content='3; url= SMessages.php'>";
;}

else{

$Conn4= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
$Dbase4 =@mysql_select_db('foursquare',$Conn4) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write4= "select * from accounts where ID = $TUID";
$Result4 =@mysql_query($Write4,$Conn4);
if ($Result4) {
	
while ($Mes= mysql_fetch_array($Result4)) {$TUName = $Mes[3]  ;};


$Conn= @mysql_connect('localhost','root','13579') or die('Problem In Server '.mysql_error());
$Dbase =@mysql_select_db('foursquare',$Conn) or die('Problem In Table Inside The Data Base '.mysql_error());
$Write= "insert into Messagefutu values('','$ID','$FUName','$Message','$TUID','$TUName','$PID',now())";
$Result =@mysql_query($Write,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
$Write1= "select Messages from Accounts where ID = '$TUID'";
$Result1 =@mysql_query($Write1,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
while ($Mes1= mysql_fetch_array($Result1)) {$NMes = $Mes1[0]  ;};
$NMes = 1 + $NMes;
$Write2= "update accounts set Messages = '$NMes' where ID = '$TUID'";
$Result2 =@mysql_query($Write2,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());
if ($Result) {
	echo "Message has Been Sent";
	echo "<meta http-equiv='Refresh' content='0; url= SMessages.php'>";
}
	
	
}  else {echo"Please Enter Your User First";
echo "<meta http-equiv='Refresh' content='3; url= SMessages.php'>";
}

}

?>
</body>
</html>

