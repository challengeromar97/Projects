<!DOCTYPE html>
<html>
<head><title>Msg From User</title></head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			
		}
		
		th.TC1, td.TC1 {
			padding: 29px;
			width: 205px;
		}

		table#TC1 tr:nth-child(even) {
			background-color: brown;
		}
		table#TC1 tr:nth-child(odd) {
			background-color: gray;
		}
		table#TC1 th {
			background-color: #f1f1c1;
			color: black;
			
		}
	</style>
	<body>

	</body>

</html>


<?php


echo "<center><strong><br>Messages That Sent From User <br><br></strong></center>";
$Conn1= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase1 =@mysql_select_db('foursquare',$Conn1) or die(mysql_error());
$Write1 = "Select * from Messagefu;";
$Result1 =@mysql_query($Write1,$Conn1) or die (mysql_error());
if (mysql_num_rows($Result1) > 0) {
	echo "<html>
<table border='2px' id='TC1' align='center' >
	<tr >
		<th class='TC1'>ID</th>
		<th class='TC1'>User Names</th>
		<th class='TC1'>Messages</th>
		<th class='TC1'>Messages</th>
		<th class='TC1'>User ID</th>
		<th class='TC1'>Date</th>
		<th class='TC1'>Delete</th>
	</tr>";

while ($User1 =@mysql_fetch_array($Result1) ) {
echo "
	<tr>
		<td class='TC1'> <center>$User1[0]</center></td>
		<td class='TC1'> <center>$User1[1]</center></td>
		<td class='TC1' colspan='2'> <center>$User1[2]</center></td>
		<td class='TC1'> <center>$User1[3]</center></td>
		<td class='TC1'> <center>$User1[4]</center></td>
		<td><center><a href='DAccounts.php?ID=$User1[0]&&NTable=Messagefu&&NTable1=Messagefu'>Delete</a></center></td>
	</tr>			
";}
echo "</table>";
	
}




?><td c></td>
</body>
</html>