<?php

// Create Connection
$conn = new mysqli("localhost","1135947","IiMaIf_4222724","1135947");

// Check The Connection #endregion
if($conn->connect_error) {die("Connection Failed To DataBase". $conn->connect_error);} 

?>