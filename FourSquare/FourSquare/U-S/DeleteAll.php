
<?php

$DAP = $_POST[DAP];
echo "$DAP";
$Conn= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase =@mysql_select_db('foursquare',$Conn) or die(mysql_error());
$Reset = "truncate $DAP ;";
$Result =@mysql_query($Reset,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());	     


	if ($Result) {
		echo " The Index inside The Table Has Been Deleted ";
} else {
	echo" there A problem To Delete Index";
}








?>