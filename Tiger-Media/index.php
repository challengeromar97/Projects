<?php

// Start Session
session_start();

// Check If User Still Login 
if (isset($_SESSION['hash']) ) {
    
    // Connect To DataBase
    require 'connection/connectToDB.php';

    $hash = $_SESSION['hash'];

    // Check If User Activate His Account Or No
    $sql = "SELECT * FROM ti_users WHERE hash = '$hash'";
    $result = $conn->query($sql) or die($conn->error);
    if($result->num_rows > 0) {
        // Output User Data
        $user = array();
        while($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value) {
                $user[$key] = $value;
            }
        }

        $USERID = $user['USERID'];
        // Check User Activate Or Not
        if ($user['Activated'] == "0") {
            echo "Please Active Your Account First <br >";
            echo "Hello ".$user['Fname']."<br> Thank You so much for joining Tiger Media! <br> You Just Need To Activate Your Account To HaveFun :)"
            ."<br> <a href=' http://localhost/Tiger/verify.php?hash=".$user['hash']."&email=".$user['Email']."'>Activate Your Account</a>";
            die();
        }

        // Check User Deleted Or Not
        if ($user['Deleteduser'] == "1") {
            echo "Your Account Has Been Deleted <br >".
                 "Hello ".$user['Fname']."<br>".
                 "Thank You so much for joining Tiger Media!<br> ".
                 "You Just Need To Create A New Account With Another Email :)".
                 "<a href='registeration.php'>Signup Now!</a>";
            die();
        }
        
        // Check If There is Form Submited
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if Post Submited
            if(isset($_POST['post'])) {
                $content = $_POST['content'];
                
                // Add User To Query
                $sql = "INSERT INTO ti_posts (USERID, PContent)" 
                ."VALUES ('$USERID', '$content')";
                $conn->query($sql) or die($conn->error);

                header("location: index.php");
            } 

            // Check if Comment Submited
            if(isset($_POST['comment'])) {
                $content = $_POST['CContent'];
                $POSTID = $_POST['postID'];
                
                // Add Comment to comments
                $sql = "INSERT INTO ti_comments (USERID, POSTID, CContent) "
                        ."VALUES ('$USERID', '$POSTID', '$content')";
                $result = $conn->query($sql) or die($conn->error);

                // Add +1 Comment
                $sql = "UPDATE ti_posts SET Comments = Comments+1 "
                        ."WHERE POSTID = '$POSTID'";
                $result = $conn->query($sql);
                header("location: index.php") or die($conn->error);
            } 

            // Check if Like Added
            if(isset($_POST['Like_POSTID'])) {
                $POSTID = $_POST['Like_POSTID'];
                $sql ="SELECT * FROM ti_likes WHERE USERID = '$USERID' AND POSTID = '$POSTID'";
                $result = $conn->query($sql) or die("no");
                if( $result->num_rows > 0 ) {
                    // Remove Like
                    $sql = "DELETE FROM ti_likes WHERE POSTID = '$POSTID' AND USERID ='$USERID'";
                } else {
                    // Add Like
                    $sql = "INSERT INTO ti_likes (USERID, POSTID) VALUES ('$USERID','$POSTID')";
                }
                $result = $conn->query($sql) or die($conn->error);
                header("location: index.php");
            } 

            // Check if Bgimg Submited
            if(isset($_FILES['bgimg'])) {
                $imgName = $_FILES['bgimg']['name'];
                $imgSize = $_FILES['bgimg']['size'];
                $imgType = $_FILES['bgimg']['type'];
                $imgtmp_name = $_FILES['bgimg']['tmp_name'];

                if($imgSize > 15000000) die();
                
                $imgName = date('y-m-d h-i-s').$imgName;

                move_uploaded_file($imgtmp_name, "assets/images/".$imgName);

                $USERID = $user['USERID'];
                
                // Add Comment to comments
                $sql = "UPDATE ti_users SET ProfileBG = '$imgName' "
                        ."WHERE USERID = $USERID";
                $result = $conn->query($sql) or die($conn->error);
                header("location: index.php");
            } 

            // Check if ppimg Submited
            if(isset($_FILES['ppimg'])) {
                $imgName = $_FILES['ppimg']['name'];
                $imgSize = $_FILES['ppimg']['size'];
                $imgType = $_FILES['ppimg']['type'];
                $imgtmp_name = $_FILES['ppimg']['tmp_name'];

                if($imgSize > 15000000) die("img size too large");
                
                $imgName = date('y-m-d h-i-s').$imgName;

                move_uploaded_file($imgtmp_name, "assets/images/".$imgName);

                // Add Comment to comments
                $sql = "UPDATE ti_users SET ProfileImg = '$imgName' "
                        ."WHERE USERID = $USERID";
                $result = $conn->query($sql) or die($conn->error);
                header("location: index.php");
            } 

                // Check if Personal Information Submited
                if(isset($_POST['personalInfo'])) {

                    $EFname = ucfirst($_POST['EFname']);
                    $ELname = ucfirst($_POST['ELname']);
                    $EUStatus = $_POST['EUStatus'];
                    $EAboutMe = $_POST['EAboutMe'];
                    $EAddress = $_POST['EAddress'];
                    $ERShip = $_POST['ERShip'];
                    $EEmail = $_POST['EEmail'];
                    $ENPass = $_POST['ENPass'];
                    $EPass = $_POST['EPass'];
                    $ENumber = $_POST['ENumber'];
                    $EHobbies = $_POST['EHobbies'];
                    
                    // Reg Exp 
                    // Reg Exp For Name
                    $sNameRegExp = '/^[a-zA-Z]{1}[a-zA-Z0-9]{2,}$/';
                    // Regexp For Email
                    $emailRegExp = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-\.]{0,100}@[a-zA-Z0-9_\-\.]{1,100}\.([a-zA-Z]{2,5})$/';
                    // Reg Exp For Password
                    $passRegExp = '/^[0-9a-zA-Z_\-\.]{8,100}$/';
                    // Reg Exp For New Password
                    $newPassRegExp = '/^([0-9a-zA-Z_\-\.]{8,100}|)$/';
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
                    if(!checkValidation($EFname, $sNameRegExp)) {
                        die("Wrong First Name Validation!");
                    }
                    // Check Last Name Validation
                    if(!checkValidation($ELname, $sNameRegExp)) {
                        die("Wrong Last Name Validation!");
                    }
                    // Check Email Validation
                    if(!checkValidation($EEmail, $emailRegExp)) {
                        die("Wrong Email Validation!");
                    }
                    // Check Number Validation
                    if(!checkValidation($ENumber, $sPhoneRegExp)) {
                        die("Wrong Number Validation!");
                    }
                    // Check New Password Validation
                    if(!checkValidation($ENPass, $newPassRegExp)) {
                        die("Wrong New Password Validation!");
                    }
                    // Check Password Validation
                    if(!checkValidation($EPass, $passRegExp)) {
                        die("Wrong Password Validation!");
                    }

                    // Check For Password
                    if(password_verify($EPass, $user['Password']) ) {
                        
                        // Check Its Not The same User email
                        if( $user['Email'] != $EEmail ) {
                            // Check For New Email if exists
                            $sql ="SELECT * FROM ti_users WHERE Email = '$EEmail'";
                            $result = $conn->query($sql) or die($conn->error);
                            if ($result->num_rows > 0) {
                                die("This Email Already Exist");
                            } 
                        }

                        // Check Its Not The same User Number
                        if( $user['Number'] != $ENumber ) {
                            // Check For New Number if exists
                            $sql ="SELECT * FROM ti_users WHERE Email = '$ENumber'";
                            $result = $conn->query($sql) or die($conn->error);
                            if ($result->num_rows > 0) {
                                die("This Number Already Exist");
                            } 
                        }

                        // Check The new Password
                        if( $ENPass == '') {
                            // Add User Without New Password To Query
                            $sql = "UPDATE ti_users SET Fname = '$EFname', Lname = '$ELname', Email = '$EEmail', Number = '$ENumber', AboutMe = '$EAboutMe', Address = '$EAddress', UStatus = '$EUStatus', RShip = '$ERShip', Hobbies = '$EHobbies' WHERE USERID = $USERID";
                        } else {
                            
                            $ENPass = password_hash($ENPass, PASSWORD_BCRYPT);

                            // Add User With New Password To Query
                            $sql = "UPDATE ti_users SET Fname = '$EFname', Lname = '$ELname', Email = '$EEmail', Password = '$ENPass', Number = '$ENumber', AboutMe = '$EAboutMe', Address = '$EAddress', UStatus = '$EUStatus', RShip = '$ERShip', Hobbies = '$EHobbies' WHERE USERID = $USERID";
                        }
                        $conn->query($sql) or die($conn->error);

                        header("location: index.php");
                    } else {
                        die("Wrong Password");
                    }
                } 

                // Check if Remove Post Submited
                if(isset($_POST['DPOSTID'])) {
                    $DPOSTID = $_POST['DPOSTID'];
                    
                    // Add Comment to comments
                    $sql = "UPDATE ti_posts SET Deletedpost = 1 WHERE POSTID = '$DPOSTID'";
                    $result = $conn->query($sql) or die($conn->error);
                    header("location: index.php");
                } 
                
                // Check if Remove Post Submited
                if(isset($_POST['SPOSTID'])) {
                    $SPOSTID = $_POST['SPOSTID'];
                    
                    // Add Comment to comments
                    $sql = "UPDATE ti_posts SET Deletedpost = 0 WHERE POSTID = '$SPOSTID'";
                    $result = $conn->query($sql) or die($conn->error);
                    header("location: index.php");
                } 

        }// End Of Submit Request
            
        // Output Posts Data
        $sql = "SELECT *"
        ." FROM ti_posts "
        ."INNER JOIN ti_users "
        ."ON ti_posts.USERID=ti_users.USERID "
        ."ORDER BY ti_posts.POSTID";
        $result = $conn->query($sql) or die($conn->error);
        $posts = array();

        // Check if there is posts Or not
        if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()) {
            $posts[] = $rows;
        }
        }


        // Output Comment Data
        $sql = "SELECT *"
        ." FROM ti_comments "
        ."INNER JOIN ti_posts "
        ."ON ti_comments.POSTID=ti_posts.POSTID "
        ."INNER JOIN ti_users "
        ."ON ti_comments.USERID=ti_users.USERID "
        ."ORDER BY ti_comments.COMMENTID";
        $result = $conn->query($sql) or die($conn->error);
        $comments = array();

        // Check if there is Comments Or not
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()) {
                $comments[] = $rows;
            }
        }
        
        // Output All Users  Data
        $sql = "SELECT * FROM ti_users";
        $result = $conn->query($sql) or die($conn->error);
        $allUsers = array();

        // Check if there is All Userss Or not
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()) {
                $allUsers[] = $rows;
            }
        }

        // Output Likes Data
        $sql = "SELECT * FROM ti_likes";
        $result = $conn->query($sql) or die($conn->error);
        $likes = array();   
        while($row = $result->fetch_assoc()) {
            $likes[] = $row;
        }

    } else {
        die("Problem With Your Hash Number");
    }
} else {
    header("location: registeration.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-pro.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap-4.3.2.min.css">
    <!-- Nav-aside Style Sheet -->
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <!-- Nav-aside Style Sheet -->
    <link rel="stylesheet" href="components/nav-aside/nav-aside.css">
    <!-- newsfeed Style Sheet -->
    <link rel="stylesheet" href="components/newsfeed/newsfeed.css">
    <!-- profile Style Sheet -->
    <link rel="stylesheet" href="components/profile/profile.css">
    <!-- about Style Sheet -->
    <link rel="stylesheet" href="components/about/about.css">
    <!-- messenger Style Sheet -->
    <link rel="stylesheet" href="components/messenger/messenger.css">
    <!-- settings Style Sheet -->
    <link rel="stylesheet" href="components/settings/settings.css">
    <!-- findfriends Js -->
    <link rel="stylesheet" href="components/findfriends/findfriends.css">
    <!-- music Js -->
    <link rel="stylesheet" href="components/music/music.css">
    <!-- photos Js -->
    <link rel="stylesheet" href="components/photos/photos.css">
    <!-- timeline Js -->
    <link rel="stylesheet" href="components/timeline/timeline.css">
    <!-- videos Js -->
    <link rel="stylesheet" href="components/videos/videos.css">

    <title>Home Page</title>
<style>
img[alt="Free Web Hosting"] {
  display:none !important;
}
</style>
</head>
<body onload=' $("#loader").animate({opacity:"0"},1000, function() {$("#loader").css("display","none")})'>

<?php
/*

      
echo "<pre>";
    print_r ($user);
echo "</pre>";
echo "<br>";

echo "<pre>";
print_r ($posts);
echo "</pre>";

echo "<pre>";
print_r ($comments);
echo "</pre>";  
echo "<br>";


echo "<pre>";
print_r ($likes);
echo "</pre>";

echo "<pre>";
print_r ($allUsers);
echo "</pre>";

*/




?>

<!-- Loader -->
<div id="loader">
<div class="spinner"></div>
</div>

<nav id="tiger-navbar">
<?php require 'components/nav-aside/nav-aside.php';?>
</nav>

<!-- newsfeed section -->
<section id="tiger-newsfeed">
<?php require 'components/newsfeed/newsfeed.php';?>
</section>

<!-- profile section -->
<section id="tiger-profile">
<?php require 'components/profile/profile.php';?>
</section>

<!-- messenger section -->
<section id="tiger-messenger">
<?php require 'components/messenger/messenger.php';?>
</section>

<!-- timeline section -->
<section id="tiger-timeline">
<?php require 'components/timeline/timeline.php';?>
</section>

<!-- settings section -->
<section id="tiger-settings">
<?php require 'components/settings/settings.php';?>
</section>

<!-- findfriends section -->
<section id="tiger-findfriends">
<?php require 'components/findfriends/findfriends.php';?>
</section>

<!-- photos section -->
<section id="tiger-photos">
<?php require 'components/photos/photos.php';?>
</section>

<!-- videos section -->
<section id="tiger-videos">
<?php require 'components/videos/videos.php';?>
</section>

<!-- music section -->
<section id="tiger-music">
<?php require 'components/music/music.php';?>
</section>


<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap-4.3.2.min.js"></script>
<script src="assets/js/index.js"></script>

<!-- nav-aside Js -->
<script src="components/nav-aside/nav-aside.js"></script>
<!-- newsfeed Js -->
<script src="components/newsfeed/newsfeed.js"></script>
<!-- profile Js -->
<script src="components/profile/profile.js"></script>
<!-- about Js -->
<script src="components/about/about.js"></script>
<!-- messenger Js -->
<script src="components/messenger/messenger.js"></script>
<!-- settings Js -->
<script src="components/settings/settings.js"></script>
<!-- findfriends Js -->
<script src="components/findfriends/findfriends.js"></script>
<!-- music Js -->
<script src="components/music/music.js"></script>
<!-- photos Js -->
<script src="components/photos/photos.js"></script>
<!-- timeline Js -->
<script src="components/timeline/timeline.js"></script>
<!-- videos Js -->
<script src="components/videos/videos.js"></script>
</body>
</html>		