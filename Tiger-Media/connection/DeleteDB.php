<?php
// Create Connection
$conn = new mysqli("localhost","1135947","IiMaIf_4222724","1135947");

// Check The Connection
if($conn->connect_error) {die("Connection Failed To DataBase". $conn->connect_error);} 

// Check If Data Base was Created Or No
$q = "DROP DATABASE 1135947";

if($conn->query($q)) {
    echo "Database Of Name Tiger Deleted";
} else {
    echo $conn->error. "<br >";
}
?>