<?php

require 'connectToDB.php';

$sql ="SELECT * FROM ti_users ";
$result = $conn->query($sql);
$users = array();

if($result->num_rows > 0){
  while($rows = $result->fetch_assoc()) {
      $users[] = $rows;
  }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="css/fontawesome-pro.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap-4.3.2.min.css">
  <link rel="stylesheet" href="css/registration.css">
  <title>Registeration</title>
</head>

<body>


<table class="table table-hover table-dark">
  <thead>
    <tr>

    <?php
    
    foreach($users[0] as $key => $value) {
      echo "<th>".$key."</th>";
    }
    
    ?>
    </tr>
  </thead>
  <tbody>
<?php

foreach($users as $key => $value) {

  echo '<tr>';
  foreach($users[$key] as $key2 => $value2) {
    echo "<td>$value2</td>";
  }
  echo '</tr>';
}

?>
  </tbody>
</table>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap-4.3.2.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>