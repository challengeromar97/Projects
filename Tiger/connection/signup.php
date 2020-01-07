<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Data Of Sign Up
    $Fname = ucfirst(strtolower($_POST['sFName']));
    $Lname = ucfirst(strtolower($_POST['sLName']));
    
    $sEmail = strtolower($_POST['sEmail']);
    $sPass = $_POST['sPass'];
    $sBirth = $_POST['sBirth'];
    $sPhone = $_POST['sPhone'];
    $sGender = $_POST['sGender'];


    // Reg Exp 
    // Reg Exp For Name
    $sNameRegExp = '/^[a-zA-Z]{1}[a-zA-Z0-9]{2,}$/';
    // Regexp For Email
    $emailRegExp = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-\.]{0,100}@[a-zA-Z0-9_\-\.]{1,100}\.([a-zA-Z]{2,5})$/';
    // Reg Exp For Password
    $passRegExp = '/^[0-9a-zA-Z_\-\.]{8,100}$/';
    // RegExp For BirthDay
    $sBirthRegExp = '/^(0{0,1}[1-9]{1}|[1-2]{1}[0-9]{1}|3{1}[0-1]{1})[-_\.\,\/\\\]{1}(0{0,1}[1-9]{1}|1{1}[0-2])[-_\.\,\/\\\]{1}([0-9]{4}|[0-9]{2})$/';
    // Reg Exp Of Phone Number
    $sPhoneRegExp = '/^[+]*([(]?[0-9]{1,4}[)]?)?[-\s\.\/0-9]{10,100}$/';
    
    // Check Validation For All Inputs
    function checkValidation($Element, $RegExp) {
        //Check If The Element Value Validate The Regular Exp
        if (preg_match($RegExp, $Element)) {
            return true;
          } else {
            return false;
          }
    }
    
    // Check First Name Validation
    if(!checkValidation($Fname, $sNameRegExp)) {
        $error_msg .= "<br > Wrong First Name Validation!";
    }

    // Check Last Name Validation
    if(!checkValidation($Lname, $sNameRegExp)) {
        $error_msg .= "<br > Wrong Last Name Validation!";
    }

    // Check Email Validation
    if(!checkValidation($sEmail, $emailRegExp)) {
        $error_msg .= "<br > Wrong Email Validation!";
    }

    // Check Password Validation
    if(!checkValidation($sPass, $passRegExp)) {
        $error_msg .= "<br > Wrong Password Validation!";
    }
    
    // Check BirthDay Validation
    if(!checkValidation($sBirth, $sBirthRegExp)) {
        $error_msg .= "<br > Wrong Birthday Validation!";
    }

    // Check Phone Number Validation
    if(!checkValidation($sPhone, $sPhoneRegExp)) {
        $error_msg .= "<br > Wrong Phone Number Validation!";
    }

    // Check Gender Validation)
    if(!isset($sGender) && ($sGender != "Male" || $sGender != "Female")) {
        $error_msg .= "<br > Wrong Gender Validation!";
    } 

    // Check TOS Checked
    if (!isset($_POST['accept'])) {
        $error_msg .= "<br > Please Read The TOS!";
    }
        

    if(
        checkValidation($Fname, $sNameRegExp)&&  // Check First Name Validation
        checkValidation($Lname, $sNameRegExp) && // Check Last Name Validation
        checkValidation($sEmail, $emailRegExp) && // Check Email Validation
        checkValidation($sPass, $passRegExp) && // Check Password Validation
        checkValidation($sBirth, $sBirthRegExp) && // Check BirthDay Validation
        checkValidation($sPhone, $sPhoneRegExp) && // Check Phone Number Validation
        isset($sGender) && ($sGender == "Male" || $sGender == "Female")&& // Check Gender Validation
        isset($_POST['accept']) // CHeck TOS Checked
        ) {

    // Connect To Data Base
    require 'connectToDB.php';

    // Check If there is Same Email On DataBase
    $sql ="SELECT * FROM ti_users WHERE Email = '$sEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error_msg = "<br > The email address you have entered is already registered, Did you forget your password?.";
        return false;
    } 

    // Check If there is Same Email On DataBase
    $sql ="SELECT * FROM ti_users WHERE Number = '$sPhone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error_msg = "<br > This Number already Used";
        return false;
    } 


    
    // Generate Random Hash And Check If There is no one Have The Same Hash
    do {
        $hash = md5(rand(0,1000));
        
        $sql ="SELECT * FROM ti_users WHERE 'hash' = '$hash'";

        $result = $conn->query($sql);

    } while ($result->num_rows > 0);

    // Hash Password
    $hashPass = password_hash($sPass, PASSWORD_BCRYPT);

    // Edit Date TO The Write Code
    preg_match($sBirthRegExp, $sBirth, $match);
    $sBirth = $match['3']."-".$match['2']."-".$match['1'];

    // Check if male Put Profile pic place holder for male
    if ($sGender == "Male" ) {
      $PPIMG = 'male-placeholder.jpg';
    } else {
      $PPIMG = 'female-placeholder.jpg';
    }




    // Add User To Query
    $sql = "INSERT INTO ti_users (hash, Fname, Lname, Email, Password, Birthday, Number, Gender, ProfileImg)" 
        ."VALUES ('$hash', '$Fname', '$Lname', '$sEmail', '$hashPass', '$sBirth', '$sPhone', '$sGender', '$PPIMG' )";
    // Add Query To Data Base
    if ($conn->query($sql)) {

        $_SESSION['hash'] = $hash ;
    
        header("location: index.php");
    } else {
        $error_msg .= "<br > Sorry There is Error".mysqli_error($conn);
    }
    mysqli_close($conn);

    } else {
        $error_msg .= "<br > Wrong Data Please Check Your Information";
    }
    
} else {
    header("location: ../registeration.php");
}
    
?>