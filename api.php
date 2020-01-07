<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

    $i = 0;
    $files = array();

    // Scan In The Same Folder
    $result = scandir('./');

    // Loop For Each File
    foreach ($result as $num => $name) {
        // Remove Useless Files from The Master Branch
        if ($name[0] != '.' && $name != 'LICENSE') {
            // Only Folders
            if (strrpos($name, ".") == false) {
                // First Scan On Project folder
                $Fresult = scandir("./$name");
                // Loop For Each File
                foreach ($Fresult as $Fnum => $Fname) {
                    // Remove Useless Files from The Master Branch
                    if ($Fname == 'index.html' || $Fname == "index.php") {
                        $dot = strrpos($Fname, ".");
                        $ext = substr($Fname, $dot + 1);
                        $files[$i] = array("name"=>$name,"type"=>$ext);
                        $i++;
                    }
                }
            }
        }
    }
    echo json_encode($files);




