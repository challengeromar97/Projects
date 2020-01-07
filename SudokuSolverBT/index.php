<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sudoku Solver By Omar</title>
    <!-- Fav icon -->
    <link rel="icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <!-- Start Of Body-->
    <div class="text-center">
        <h1 class="d-inline p-4">Soduku Solver By Omar</h1>
        <button class="btn btn-outline-success" id="solve">Solve</button>
        <button class="btn btn-outline-danger" id="clear">Clear</button>
        <p id='yes'></p>
    </div>

    <table border="1px">

    <?php

        for($x =0; $x < 9; $x++) {
            echo "<tr>";

            for($y = 0; $y < 9; $y++) {
                echo "<td><input type='text' id='".$x.$y."' autocomplete='false'></td>";
            }

            echo "</tr>";
        }
    ?>


    </table>






    <!-- End Of Body --->
    <script src="js/jquery-3.3.1.min..js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>