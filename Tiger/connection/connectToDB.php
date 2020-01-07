<?php

// Create Connection
$conn = new mysqli("localhost","root","","tiger");

// Check The Connection #endregion
if($conn->connect_error) {die("Connection Failed To DataBase". $conn->connect_error);} 

?>