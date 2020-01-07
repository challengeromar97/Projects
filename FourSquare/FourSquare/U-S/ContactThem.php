<html>
	<head><title>Contact Them</title></head>
</html>
<?php



$Conn= @mysql_connect('localhost','root','13579');
$DB =@mysql_select_db('Foursquare',$Conn);
$query ="select * from Accounts";
$Users = @mysql_query($query,$Conn);

echo "<form action='MessageWS.php' method='post'>";
echo '<select name="ID" style="width:500px;height:35px;" >';
echo '<option value= 0 >Choose User Name</option>';
while ($UName= mysql_fetch_array($Users)) {
	echo"<option value='$UName[ID]' >$UName[UName]</option>";
};





echo"</select></br></br><textarea name='MessageF' rows='5' cols='150' placeholder='Write Meassege' style='resize: none;float:left;' required></textarea>

			<input type='submit' value='Send Message' style='width:170px;height:82px;' />
		</form></body></html>";

?>
