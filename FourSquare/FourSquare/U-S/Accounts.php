<!DOCTYPE html>
<html>
<head><title>Accounts</title></head>
	
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
.Img{
	width: 50px;
	height: 50px;
}
</style>
	<body>

	</body>

</html>


<?php

echo "<center><strong><br><br>All Users Accounts even That Deleted<br><br></strong></center>";
$Conn= @mysql_connect('localhost','root','13579') or die(mysql_error());
$Dbase =@mysql_select_db('foursquare',$Conn) or die(mysql_error());
$Write = "Select * from accounts;";
$Result =@mysql_query($Write,$Conn) or die (mysql_error());
if (mysql_num_rows($Result) > 0) {

echo "
<table class=''>
					<thead>
						<tr>
							<th>User Names</th>
							<th>Users ID</th>
							<th>Delete</th>
							<th>First Names</th>
							<th>Last Names</th>
							<th>Passwords</th>
							<th>Emails</th>
							<th>Birthdays</th>
							<th>Alternative Emails</th>
							<th>Phone Numbers</th>
							<th>Zip Codes</th>
							<th>Secret Questions</th>
							<th>Secret Answer</th>
							<th>Sex</th>
							<th>SignUpD</th>
							<th>SignUpDT</th>
							<th>Profile Pic</th>
							<th>BackGround Pic</th>
							<th>Messages</th>
							<th>Friends</th>
							<th>Upsilon</th>
							<th>Upsilon</th>
							<th>Upsilon</th>
							
						</tr>
					</thead>";
};
while ($User =@mysql_fetch_array($Result) ) {
echo "
		<tbody>
				<tr>
					<th>$User[3]</th>
					<td class='err' >$User[0]</td>
					<td><a href='DAccounts.php?ID=$User[0]&&NTable=accounts&&NTable1=accounts'>Delete Acc</a></td>
					<td>$User[1]</td>
					<td>$User[2]</td>
					<td>$User[4]</td>
					<td>$User[5]</td>
					<td>$User[6]</td>
					<td>$User[7]</td>
					<td>$User[8]</td>
					<td>$User[9]</td>
					<td>$User[10]</td>
					<td>$User[11]</td>
					<td>$User[12]</td>
					<td>$User[13]</td>
					<td>$User[14]</td>
					<td><img src='Img/profile/PIC/$User[PIMG]' class='Img' /></td>
					<td><img src='Img/profile/BPic/$User[BIMG]' class='Img' /></td>
					<td>$User[17]</td>
					<td>$User[18]</td>
					<td>$User[19]</td>
					<td>$User[20]</td>
					<td>$User[21]</td>
				</tr>
			</tbody>
";}
echo "</table>";


?><img src="" />
	
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
	</body>
</body>
</html>

