<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Data Of Login
    $lEmail = strtolower($_POST['lEmail']);
    $lPass = strtolower($_POST['lPass']);

    // Regexp For Email
    $emailRegExp = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-\.]{0,100}@[a-zA-Z0-9_\-\.]{1,100}\.([a-zA-Z]{2,5})$/';
    // Reg Exp For Password
    $passRegExp = '/^[0-9a-zA-Z_\-\.]{8,100}$/';
 
    // Check Validation For All Inputs
    function checkValidation($Element, $RegExp) {
        //Check If The Element Value Validate The Regular Exp
        if (preg_match($RegExp, $Element)) {
            return true;
          } else {
            $error_msg = "Sorry You Must Check Your Input Validation";
            return false;
          }
    }
    
    // Check Email Validation
    if(!checkValidation($lEmail, $emailRegExp)) {
        $error_msg .= "<br > Wrong Email Validation!";
    }

    // Check Password Validation
    if(!checkValidation($lPass, $passRegExp)) {
        $error_msg .= "<br > Wrong Password Validation!";
    }

    if(
        checkValidation($lEmail, $emailRegExp) && // Check Email Validation
        checkValidation($lPass, $passRegExp) // Check Password Validation
        ) {
        // Connect To Data Base
        require 'connectToDB.php';

        // Check If there is Same Email On DataBase
        $sql ="SELECT * FROM ti_users WHERE Email = '$lEmail'";
        $result = $conn->query($sql) or die($conn->error);;
        if ($result->num_rows == 1) {
        
            // Check The Password Is Correct Or NO?
            while($row = $result->fetch_assoc()) {
                if( password_verify($lPass, $row['Password']) ) {
                    $hash = $row['hash'];
                    // Start Session
                    session_start();
                    $_SESSION['hash'] = $hash ;
                    header("location: index.php");
                } else {
                    $error_msg .= "<br > Wrong Password!";
                    return false;
                }
            }
            
        } else if($result->num_rows == 0){
            $error_msg .= "<br > Wrong Email!";
            return false;
        } else {
            $error_msg .= "<br > OMG HOW!!! This Email Signup 2 Times";
            return false;
        }

    } else {
        $error_msg .= "<br > Password Or Email Not Vaildate";
        return false;
    }

} else {
    header("location: registeration.php");
}

?>

