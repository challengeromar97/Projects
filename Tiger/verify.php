<?php


session_start();
if(isset($_GET['hash']) && !empty($_GET['hash']) AND isset($_GET['email']) && !empty($_GET['email']) ) {
    
    // include Database
    include 'connection/connectToDB.php';

    $email = $_GET['email'];
    $hash = $_GET['hash'];

    // Check For Hash 
    $sql ="SELECT * FROM ti_users WHERE hash = '$hash'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
            
        // Then Check For Email 
        $sql ="SELECT * FROM ti_users WHERE hash ='$hash' AND Email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                
            while($row = mysqli_fetch_assoc($result)) {
                // Check if Account is already Activated
                if($row['Activated'] == "1") {
                    echo "Your Account Already Activated";
                } else {
                    // Then Set The Accounte To Activated
                    $q ="UPDATE ti_users SET Activated = '1' WHERE Email = '$email' AND hash = '$hash'";
                    $result = mysqli_query($conn, $q);
                    header("location: index.php");
                }
            }
        } else {
            echo "Wrong Email";
        }
    } else {
        echo "Wrong Hash!";
    }
} else {
    echo "Your Activation Code Is Unvalid";
    
}

?> 