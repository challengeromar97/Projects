<?php

//Error Msg
$error_msg= "";
session_start();
session_unset();


// Check if User Has Submit The Form
if( $_SERVER["REQUEST_METHOD"] == "POST") {

  // Chech If The Form submit was signup or login
  if (isset($_POST['signup'])) {
    require 'connection/signup.php';
  } else if (isset($_POST['login'])) {
    require 'connection/login.php';
  } else if (isset($_POST['forgot'])) {
    require 'connection/forgot.php';
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
  <link rel="stylesheet" href="assets/css/fontawesome-pro.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap-4.3.2.min.css">
  <link rel="stylesheet" href="assets/css/registeration.css">
  <title>Registeration</title>
</head>

<body>

  <!-- Loader -->
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <div class="overlay p-3 ">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-md-6">
          <div id="content" class="text-white">
            <h1>The Most Complete Social Network is Here!</h1>
            <p>We are the best and biggest social network with 5 billion active users all around the world. Share you
              thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
            </p>
            <a href="#" class="btn btn-md btn-outline-success">Register Now!</a>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Error Message Here -->
          <p id="error-msg"><span>Error Message</span><?php echo "$error_msg";?></p>

          <!-- registeration Form -->
          <section id="register">


            <!-- Icons For SignUp & Login -->
            <div class="reg-left">
              <div class="reg-active"><i class="fas fa-user-plus"></i></div>
              <div><i class="fas fa-sign-in-alt"></i></div>
            </div>

            <!-- Container For 2 Forms-->
            <div id="reg-right">

              <!-- Signup Form -->
              <div id="signUp">
                <h3>Signup</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" >
                  <!-- Signup Name -->
                  <div class="form-row">
                    <!-- First Name -->
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="sFName" placeholder="First Name" value="<?php if(isset($_POST['sFName'])){ echo $_POST['sFName']; } ?>">
                    </div>
                    <!-- Last Name -->
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="sLName" placeholder="Last Name" value="<?php if(isset($_POST['sLName'])){ echo $_POST['sLName']; } ?>">
                    </div>
                  </div>
                  <!-- Signup Email -->
                  <div class="form-group">
                    <input type="email" class="form-control" name="sEmail" placeholder="Email" value="<?php if(isset($_POST['sEmail'])){ echo $_POST['sEmail']; } ?>">
                  </div>
                  <!-- SignUp Password-->
                  <div class="form-group">
                    <input type="password" class="form-control" name="sPass" placeholder="Password" value="<?php if(isset($_POST['sPass'])){ echo $_POST['sPass']; } ?>">
                  </div>
                  <!-- Signup Birthday -->
                  <div class="form-group">
                    <input type="text" class="form-control" name="sBirth" placeholder="Birthday DD-MM-YYYY" value="<?php if(isset($_POST['sBirth'])){ echo $_POST['sBirth']; } ?>">
                  </div>
                  <!-- SignUp Phone Number-->
                  <div class="form-group">
                    <input type="text" class="form-control" name="sPhone" placeholder="Phone Number" value="<?php if(isset($_POST['sPhone'])){ echo $_POST['sPhone']; } ?>">
                  </div>
                  <!-- Signup Gender -->
                  <div class="form-group">
                    <select class="form-control" name="sGender">
                      <option <?php if (isset($sGender) && $sGender=="Male" ) echo "selected" ;?> >Male</option>
                      <option <?php if (isset($sGender) && $sGender=="Female" ) echo "selected" ;?> >Female</option>
                    </select>
                  </div>
                  <!-- Accept T&C -->
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="accept" name="accept">
                    <label class="custom-control-label" for="accept">I accept the <a href="#">Terms and Conditions</a>
                      of the
                      website</label>
                  </div>
                  <!-- Submit Button -->
                  <input type="submit" name="signup" class="btn btn-outline-success w-100" value="Signup">
                </form>
              </div>

              <!-- Login Form -->
              <div id="logIn">

                <div id="forgotPass">
                  <h3> Reset Your Password</h3>
                  <!--Reset Password Form -->
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
                    <!-- Email input -->
                    <div class="form-group">
                      <input type="text" class="form-control" name="fEmail" placeholder="Email"">
            </div>
            <!-- Submit Button -->
            <input type="
                        submit" class="btn btn-outline-success w-100" name="forgot" value="Reset Password">

                      <a class="forgotPassBtn text-primary d-block p-1">Go To Login</a>
                  </form>
                </div>

                <h3>Login</h3>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
                  <!-- Login Email -->
                  <div class="form-group">
                    <input type="email" class="form-control" name="lEmail" value="<?php if(isset($lEmail)){ echo $lEmail; } ?>"
                      placeholder="Email">
                  </div>
                  <!-- Login Password-->
                  <div class="form-group">
                    <input type="password" class="form-control" name="lPass" placeholder="Password">
                  </div>
                  <!-- Accept T&C -->
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remeber Me</label>
                    <a class="forgotPassBtn text-primary d-inline-block ml-5">Forgot Your Password</a>
                  </div>
                  <!-- Submit Button -->
                  <input type="submit" class="btn btn-outline-success w-100" name="login" value="Login">

                  <p id="orSection">OR</p>
                  <!-- Facebook Login-->
                  <div class="btn btn-primary w-100 my-2">Facebook</div>
                  <!-- Twitter Login-->
                  <div class="btn btn-danger w-100 my-2">Twitter</div>

                  <p>You Don’t have an account? <span id="registerNow">Register Now!</span> it’s really simple and you
                    can
                    start enjoing all the benefits!</p>
                </form>
              </div>

            </div>

          </section>
        </div>
      </div>
    </div>

  </div>






  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap-4.3.2.min.js"></script>
  <script src="assets/js/registeration.js"></script>

</body>

</html>