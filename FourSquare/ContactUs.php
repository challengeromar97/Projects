<html><meta http-equiv="Refresh" content="5;url= homepage.php"></html>

<?php
$Message = $_POST[Messageto];
$ID = $_POST[ID];
$Name = $_POST[Name];
echo "$Message </br>$ID</br>$Name</br>";
$Conn =@mysql_connect('localhost','root','13579')or die ("error on connecting to server".mysql_error());
$DB =@mysql_select_db('Foursquare',$Conn)or die ("error on connecting to database".mysql_error());
$query="insert into MessageFU values('','$Name','$Message','$ID',now())";
$MessageR =@mysql_query($query,$Conn)or die ("error on connecting to table".mysql_error());
if ($MessageR) {
echo "Your Message Has Been Sent Thank You ";
} else {
echo "There's A problem In Senting Message";
}



?>

