<!DOCTYPE html>
<html>
<head><title>Msg To User</title></head>
	<style>
	
<style>
@media screen and (max-width: 25em) {.codrops-icon span {display: none;}}
.component .filler {font-family: "Blokk", Arial, sans-serif;color: #d3d3d3;}
table {border-collapse: collapse; margin-bottom: 3em; width: 100%; background: #fff;}
td, th { padding: 0.75em 1.5em;text-align: left;}
td.err {background-color: #e992b9;color: #fff;font-size: 0.75em;text-align: center;line-height: 1;}
th {background-color: #31bc86; font-weight: bold; color: #fff;white-space: nowrap;}
tbody th {background-color: #2ea879;}
tbody tr:nth-child(2n-1) {background-color: #f5f5f5;transition: all .125s ease-in-out;}
tbody tr:hover {background-color: rgba(129,208,177,.3);}
.sticky-wrap {overflow-x: auto;overflow-y: hidden;position: relative;margin: 3em 0;width: 100%;}
.sticky-wrap .sticky-thead,.sticky-wrap .sticky-col,.sticky-wrap .sticky-intersect {
opacity: 0;position: absolute;top: 0;left: 0;transition: all .125s ease-in-out;z-index: 50;width: auto;}
.sticky-wrap .sticky-thead {box-shadow: 0 0.25em 0.1em -0.1em rgba(0,0,0,.125);z-index: 100;width: 100%;}
.sticky-wrap .sticky-intersect {opacity: 1;z-index: 150;}
.sticky-wrap .sticky-intersect th {background-color: #666;color: #eee;}
.sticky-wrap td,.sticky-wrap th {box-sizing: border-box;}
td.user-name {text-transform: capitalize;}
.sticky-wrap.overflow-y {overflow-y: auto;max-height: 50vh;}
@import url(http://fonts.googleapis.com/css?family=Lato:300,400,700);
*, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
body {font-family: 'Lato', Arial, sans-serif;color: #7c8d87;background: #f8f8f8;}
a {color: #31bc86;text-decoration: none;}
a:hover, a:focus {color: #7c8d87;}
.container > header {margin: 0 auto;padding: 2em;text-align: center;background: rgba(0,0,0,0.01);}
.container > header h1 {font-size: 2.625em;line-height: 1.3;margin: 0;font-weight: 300;}
.container > header span {display: block;font-size: 60%;opacity: 0.7;padding: 0 0 0.6em 0.1em;}
.codrops-top {background: #fff;background: rgba(255, 255, 255, 0.6);text-transform: uppercase;width: 100%;font-size: 0.69em;line-height: 2.2;}
.codrops-top a {text-decoration: none;padding: 0 1em;letter-spacing: 0.1em;display: inline-block;}
.codrops-top a:hover {background: rgba(255,255,255,0.95);}
.codrops-top span.right {float: right;}
.codrops-top span.right a {float: left;display: block;}
.codrops-icon:before {font-family: 'codropsicons';margin: 0 4px;speak: none;font-style: normal;font-weight: normal;font-variant: normal;text-transform: none;line-height: 1;-webkit-font-smoothing: antialiased;}
.codrops-icon-drop:before {content: "\e001";}
.codrops-icon-prev:before {content: "\e004";}
.codrops-demos {padding-top: 1em;font-size: 0.8em;}
.codrops-demos a {display: inline-block;margin: 0.5em;padding: 0.7em 1.1em;outline: none;border: 2px solid #31bc86;text-decoration: none;text-transform: uppercase;letter-spacing: 1px;font-weight: 700;}
.codrops-demos a:hover,.codrops-demos a.current-demo,.codrops-demos a.current-demo:hover {border-color: #7c8d87;color: #7c8d87;}
.related {text-align: center;font-size: 1.5em;padding-bottom: 3em;}
</style>
	</style>
	<body>

	</body>

</html>


<?php


echo "<center><strong><br>Messages That Sent To User <br><br></strong></center>";
$Conn1= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase1 =@mysql_select_db('foursquare',$Conn1) or die(mysql_error());
$Write1 = "Select * from Messagetu;";
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
		<td><center><a href='DAccounts.php?ID=$User1[0]&&NTable=Messagetu&&NTable1=Messagetu' >Delete</a></center></td>
	</tr>			
";}
echo "</table>";
}



?>

	
	
</body>
</html>