<!DOCTYPE html>
<html>
<head><title>UAccounts</title></head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			
		}
		th.TC1, td.TC1 {
			padding: 40px;
			width: 90px;
		}
		th.TC2, td.TC2 {
			padding: 15px;
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


echo "<center><strong><br>User Accounts Avilable<br><br></strong></center>";
$Conn1= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase1 =@mysql_select_db('foursquare',$Conn1) or die(mysql_error());
$Write1 = "select ID,UName,Password,Email,SignUpDate from uaccounts;";
$Result1 =@mysql_query($Write1,$Conn1) or die (mysql_error());

if (mysql_num_rows($Result1) > 0) {

echo "<html>

<table border='2px' id='TC1' align='center' >
	<tr >
		<th class='TC1'>Users ID</th>
		<th class='TC1'>User Names</th>
		<th class='TC1'>Passwords</th>
		<th class='TC1'>Emails</th>
		<th class='TC1'>SignUpD</th>
		<th class='TC1'>Delete</th>
	</tr>";

while ($User1 =@mysql_fetch_array($Result1) ) {
echo "
	<tr>
		<td class='TC1'> <center>$User1[0]</center></td>
		<td class='TC1'> <center>$User1[1]</center></td>
		<td class='TC1'> <center>$User1[2]</center></td>
		<td class='TC1'> <center>$User1[3]</center></td>
		<td class='TC2'> <center>$User1[4]</center></td>
		<td><center><a href='DAccounts.php?ID=$User1[0]&&NTable=uaccounts&&NTable1=Uaccounts'>Delete</a></center></td>
	</tr>			
";}
echo "</table>";

};


?>

	
	
</body>
</html>