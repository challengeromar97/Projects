<html>
<meta http-equiv="Refresh" content="0; url= <?php echo $_GET[NTable1];?>.php">
</html>


<?php

$conn = @mysql_connect('localhost','root','13579')or die ("Problem Connecting in Server ".mysql_error());
$Db = @mysql_select_db('Foursquare',$conn)or die ("Problem Connecting in Table ".mysql_error());
$query1 = "delete from $_GET[NTable] where ID = $_GET[ID]";
$Deleted1 = @mysql_query($query1,$conn)or die ('Sorry Theres No Email '.mysqli_error());



?>