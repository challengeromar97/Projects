<?php


require ('connectToDB.php');

if( $_SERVER["REQUEST_METHOD"] == 'POST' ) {
    
    if( isset($_POST['newPassword'])) {
        $hash = $_POST['hash'];
        $newEmail = $_POST['newEmail'];
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
        // Update USER
        $sql = "UPDATE ti_users SET Password = '$newPassword', Email = '$newEmail' WHERE hash = '$hash' ";
        $result = $conn->query($sql) or die("cant update user");
        echo "user Updated";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Users</title>
</head>
<body>
    

<form method="POST" action="">
    <input type="text" name="hash" placeholder='Enter Hash Number Here'>
    <input type="text" name="newEmail" placeholder='Enter New Email Here'>
    <input type="text" name="newPassword" placeholder='Enter New Password Here'>
    <input type="submit" placeholder='Enter New Password Here'>
</form>


</body>
</html>