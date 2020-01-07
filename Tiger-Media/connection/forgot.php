<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Email Input
    $sEmail = strtolower($_POST['fEmail']);
    
    // Regexp For Email
    $emailRegExp = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-\.]{0,100}@[a-zA-Z0-9_\-\.]{1,100}\.([a-zA-Z]{2,5})$/';
    
    // Check First Name Validation
    if(!preg_match($emailRegExp, $sEmail)) {
        $error_msg .= "<br >Wrong Email Validation!";
        return false;
    }

    // Connect To Data Base
    require 'connectToDB.php';

    // Check If there is Same Email On DataBase
    $sql ="SELECT * FROM ti_users WHERE Email = '$sEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error_msg .="<br >We Have Sent You New Password Via Email";
    } else {
        $error_msg .="<br >Wrong Email!";
        return false;
    }

} else {
    header("location: registeration.php");
}

?>