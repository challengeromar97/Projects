<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Ready\assets\css\bootstrap.min.css">
    <!-- Fav icon -->
    <link rel="icon" href="./favicon.ico">
    <title>Projects</title>
    <style>
        .project {
            border: 1px solid rgba(0,0,0,.2);
            min-width: 450px;
            height: auto;
            margin: 10px;
            position: relative;
        }
        .link {
            padding:0px 20px;
            overflow:auto;
            height: 200px;
        }
        h3 {
            padding: 10px; 
            background-color: hotpink;
            color: #fff;
        }
        img[alt="Free Web Hosting"] {
            display:none;
        }
    </style>
</head>


<body>

<div class="jumbotron">
  <h1 class="display-4">Hello, User!</h1>
  <p class="lead">Its a site for all my projects.   </p>
  <hr class="my-4">
  <p>This Site will Be available soon. Only omar can access this site now. Sorry Dude!</p>
  <input type="text" id="itsme" class="form-control w-50 mb-4">
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

<div id="site" style="display:none">
    <h1 class="text-center">My Projects</h1>
    <div class="container">
        <div class="row justify-content-center">


<?php

    $results = 0;
    // Scan In The Same Folder
    $result = scandir('./');
    
    // Loop For Each File
    foreach ($result as $num => $name) {
        // Remove Useless Files from The Master Branch
        if ($name[0] != '.' && $name != 'LICENSE') {
            // Only Folders
            if (strrpos($name, ".") == false) {
                echo "<div class='project'>";
                
                // Project Name
                echo "<h3>".(++$results).")$name</h3><div class='link'>";
                
                // First Scan On Project folder
                $Fresult = scandir("./$name");

                // Loop For Each File
                foreach ($Fresult as $Fnum => $Fname) {
                    
                    // Remove Useless Files from The Master Branch
                    if ($Fnum != 0 &&
                        $Fnum != 1 &&
                        $Fname != 'css' &&
                        $Fname != 'images' &&
                        $Fname != 'js' &&
                        $Fname != 'webfonts') {

                        // Only Files
                        if (strrpos($Fname, ".") != 0) {
                            $dot = strrpos($Fname, ".");
                            $ext = substr($Fname, $dot);
                            if ($ext == '.html' || $ext =='.php') {
                                echo "<p><a target='_blank' href='./$name/$Fname'>$Fname</a></p>";
                            }
                        } else { // Only Folders

                            // Second Scan On Project folder
                            $Sresult = scandir("./$name/$Fname");
                            // Loop For Each File
                            foreach ($Sresult as $Snum => $Sname) {
                                // Remove Useless Files from The Master Branch
                                if ($Snum != 0 && $Snum != 1) {
                                    // Only Folders
                                    if (strrpos($Sname, ".") != 0) {
                                        $dot1 = strrpos($Sname, ".");
                                        $ext1 = substr($Sname, $dot1);
                                        if ($ext1 == '.html' || $ext1 =='.php') {
                                            echo "<p><a target='_blank' href='./$name/$Fname/$Sname'>$Fname => $Sname</a></p>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                // End Project Folder
                echo "</div></div>";
            }
        }
    }



?>
</div>
</div>
</div>
<script src="Ready/assets/js/jquery-3.4.1.min.js"></script>

<script>

    $("#site").css({"display":"none"});
    $("#itsme").val(localStorage.getItem("user"));
    var name = $("#itsme").val();
    if(name == "challengeromar") {
        $("#site").css({"display":"block"});
        $(".jumbotron").css({"display":"none"});
    }

    $("#itsme").on("keypress", function() {
        var name = $('#itsme').val();
        if(name == "challengeromar") {
            $("#site").css({"display":"block"});
            $(".jumbotron").css({"display":"none"});
            localStorage.setItem("user", name);
        }
    });
</script>
</body>
</html>