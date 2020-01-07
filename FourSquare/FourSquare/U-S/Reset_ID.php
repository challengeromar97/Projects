<?php
$RID =$_POST[RID];
echo "$RID";
$Conn= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase =@mysql_select_db('foursquare',$Conn) or die(mysql_error());
$Reset = "alter table $RID drop ID;";
$Reset1 = "alter table $RID add ID int(11) primary key auto_increment first";
$Result =@mysql_query($Reset,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());	     
$Result1 =@mysql_query($Reset1,$Conn) or die ('Problem In The Values That Need to Write In Table '.mysql_error());	     

if ($Result) {
	if ($Result1) {
		echo " The ID Has Been Reset";
		echo "<meta http-equiv='Refresh' content='0; url= admin.php'>";
	}
} else {
	echo" there A problem To Reset Id";
}






?>
