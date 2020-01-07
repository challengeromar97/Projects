
// Loading Screen
$("body").on("load", 
     $('#loader').animate({opacity:"0"},1000, function() {
          $('#loader').css("display","none")
     })
);

// Switch Between Forms

// Sign Up Icon
var signupIcon = $("#register .reg-left div:first-of-type"),
  // Login Icon
  loginIcon = $("#register .reg-left div:last-of-type"),
  // Sign Up Container
  signupCont = $("#register #signUp"),
  // Login Container
  loginCont = $("#register #logIn"),
  // Word Register Now Add Function On Click To Navigate To Signup Form
  registerNow = $("#registerNow"),
  // Forgot Password Button
  fpbtn = $(".forgotPassBtn"),
  // Forgot Password Form
  fpform = $("#forgotPass"),
  
  // Login Inputs

  // Email Input
  lemail = $("#lEmail"),
  // Password Input
  lpass = $("#lPass"),
  // Login Submit
  loginSubmit = $("#loginSubmit"),
  // SignUp Inputs

  // First Name Input SignUp
  sFName = $('input[name="sFName"]'),
  // Last Name Input SignUp
  sLName = $('input[name="sLName"]'),
  // Email Input SignUp
  sEmail = $('input[name="sEmail"]'),
  // Password Input SignUp
  sPass = $('input[name="sPass"]'),
  // Birthday input SignUp
  sBirth = $('input[name="sBirth"]'),
  // Phone Number SignUp
  sPhone = $('input[name="sPhone"]'),
  // Radio Button For Accept T&S SignUp
  accept = $('input[name="accept"]'),
  // SignUp Submit
  signupSubmit = $("#signupSubmit"),
  // Reg Exp

  // Reg Exp For Name
  sNameRegExp = /^[a-zA-Z]{1}[a-zA-Z0-9]{2,}$/,
  // Regexp For Email
  emailRegExp = /^[a-zA-Z0-9]{1}[a-zA-Z0-9_\-\.]{0,100}@[a-zA-Z0-9_\-\.]{1,100}\.([a-zA-Z]{2,5})$/,
  // Reg Exp For Password
  passRegExp = /^[0-9a-zA-Z_\-\.]{8,100}$/,
  // RegExp For BirthDay
  sBirthRegExp = /^(0{0,1}[1-9]{1}|[1-2]{1}[0-9]{1}|3{1}[0-1]{1})[-_\.\,\/\\]{1}(0{0,1}[1-9]{1}|1{1}[0-2])[-_\.\,\/\\]{1}([0-9]{4}|[0-9]{2})$/,
  // Reg Exp Of Phone Number
  sPhoneRegExp = /^[+]*([(]?[0-9]{1,4}[)]?)?[-\s\.\/0-9]{10,100}$/;

// Go to Signup Form
function goToSignup() {
  signupIcon.addClass("reg-active");
  loginIcon.removeClass("reg-active");
  signupCont.css("bottom", "100%");
  signupCont.animate({
    bottom: "0%"
  });
  loginCont.css("display", "none");
  signupCont.css("display", "block");
}

// Go to Login Form
function goToLogin() {
  loginIcon.addClass("reg-active");
  signupIcon.removeClass("reg-active");
  loginCont.css("bottom", "100%");
  loginCont.animate({
    bottom: "0%"
  });
  signupCont.css("display", "none");
  loginCont.css("display", "block");
}

//Go To goToForgotForm
function goToForgotForm() {
    fpform.fadeToggle();
}

// Check Validation Of Any Input Falue
function checkValidation(iElement, iRegExp) {
  if (iRegExp.test(iElement.val()) === true) {
    //Check If The Element Value Validate The Regular Exp
    iElement.css({
      borderColor: "limegreen",
      boxShadow: "0 0 4px limegreen"
    });
    return true;
  } else {
    iElement.css({
      borderColor: "red",
      boxShadow: "0 0 4px red"
    });
    return false;
  }
}

// Login Submit
function loginVaildation() {
  if (localStorage.getItem("users")) {
    var users = JSON.parse(localStorage.getItem("users"));
    for (var i = 0; i < users.length; i++) {
      if (
        lemail.val().toLowerCase() == users[i].uEmails &&
        lpass.val() == users[i].uPasswords
      ) {
        alert("Congratus You Have Login Welcome Back " + lemail.val());
        return true;
      }
    }
    alert("Wrong Email Or Password Please Check Your Info");
    return false;
  } else {
    alert("Wrong Email Or Password Please Check Your Info");
    return false;
  }
}

//SignUp Submit
function signupValidation() {
  if (
    checkValidation(sFName, sNameRegExp) && // Check First Name Validation
    checkValidation(sLName, sNameRegExp) && // Check Last Name Validation
    checkValidation(sEmail, emailRegExp) && // Check Email Validation
    checkValidation(sPass, passRegExp) && // Check Password Validation
    checkValidation(sBirth, sBirthRegExp) && // Check BirthDay Validation
    checkValidation(sPhone, sPhoneRegExp) && // Check Phone NumberValidation
    accept.prop("checked") // Check Radio Button Is Checked
  ) {
    // Check If There is Data In Local Storage Or Not
    if (localStorage.users) {
      // Get User Data To Local Storage
      var oldUsers = JSON.parse(localStorage.getItem("users"));

      var currentUser = {
        firstName: sFName.val().toLowerCase(),
        lastName: sLName.val().toLowerCase(),
        uEmails: sEmail.val().toLowerCase(),
        uPasswords: sPass.val(),
        uBirthday: sBirth.val(),
        sPhone: sPhone.val(),
        startDate: Date()
      };
      // Check If Any One Used This Email Before
      for (var i = 0; i < oldUsers.length; i++) {
        if (currentUser.uEmails == oldUsers[i].uEmails) {
          alert(
            "You Have Been Registered Before With This Email Do You <a>Forget Your Password</a>"
          );
          return false;
        }
      }

      // Add The New Account To the Current Local Storage
      oldUsers.push(currentUser);
      var NewUsers = JSON.stringify(oldUsers);
      localStorage.setItem("users", NewUsers);

      // Add The New Account To New Local Storage
    } else {
      var newUser = [
          {
            firstName: sFName.val(),
            lastName: sLName.val(),
            uEmails: sEmail.val().toLowerCase(),
            uPasswords: sPass.val(),
            uBirthday: sBirth.val(),
            sPhone: sPhone.val(),
            startDate: Date()
          }
        ],
        // Add The New Account To New Local Storage
        userS = JSON.stringify(newUser);
      localStorage.setItem("users", userS);
    }
    return true;
  } else {
    alert("Wrong Data Please Check Your Info");
    return false;
  }
}

// Show Error MSG 
$('#error-msg').hide();
if($('#error-msg').text().length > 13){
  $('#error-msg').delay(2000).fadeIn(1000);
}

// Add Spell Checked Attribute to inputs
$(function() {
  $("input").attr({
    spellcheck: "false"
  });
});

// On Click Functions
signupIcon.on("click", goToSignup);
registerNow.on("click", goToSignup);
loginIcon.on("click", goToLogin);
fpbtn.on("click", goToForgotForm);

// Login Validation Functions
lemail.on("keyup", function() {
  checkValidation(lemail, emailRegExp);
});
lpass.on("keyup", function() {
  checkValidation(lpass, passRegExp);
});

//Sign up Validation Functions
sFName.on("keyup", function() {
  checkValidation(sFName, sNameRegExp);
});
sLName.on("keyup", function() {
  checkValidation(sLName, sNameRegExp);
});
sEmail.on("keyup", function() {
  checkValidation(sEmail, emailRegExp);
});
sPass.on("keyup", function() {
  checkValidation(sPass, passRegExp);
});
sBirth.on("keyup", function() {
  checkValidation(sBirth, sBirthRegExp);
});
sPhone.on("keyup", function() {
  checkValidation(sPhone, sPhoneRegExp);
});


// On Submit Function
loginSubmit.on("click", loginVaildation);
signupSubmit.on("submit", signupValidation);