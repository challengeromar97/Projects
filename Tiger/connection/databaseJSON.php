<?php

require 'connectToDB.php';

$sql = "SELECT * FROM ti_users";
$result = $conn->query($sql) or die("cant");
$JSON = array();

while ($rows = $result->fetch_assoc()) {

  $JSON[] = $rows;

}

echo "<pre>";
print_r ($JSON);
echo "</pre>";

?>
