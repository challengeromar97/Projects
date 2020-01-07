
// Board 
var board = [
    [4, 0, 3, 8, 7, 2, 0, 5, 9],
    [0, 0, 8, 0, 0, 0, 0, 0, 4],
    [0, 0, 0, 6, 0, 0, 8, 0, 0],
    [1, 0, 5, 7, 0, 3, 0, 0, 0],
    [2, 0, 6, 5, 0, 8, 9, 0, 7],
    [0, 0, 0, 4, 0, 6, 5, 0, 1],
    [0, 0, 7, 0, 0, 1, 0, 0, 0],
    [8, 0, 0, 0, 0, 0, 0, 0, 0],
    [9, 3, 0, 2, 6, 5, 7, 0, 8]
],
    p = $('p');

for (var x = 0; x <= 8; x++) {
    for (var y = 0; y <= 8; y++) {
        var id = "#" + x + "" + y;
        if (board[x][y] != 0) {
            $(id).val(board[x][y]);
        } else {
            $(id).val("");
        }
    }
}

$("#clear").on("click", function () {
    for (var x = 0; x <= 8; x++) {
        for (var y = 0; y <= 8; y++) {
            var id = "#" + x + "" + y;
            $(id).val("");
            $(id).css({ "background-color": "#fff", "color": "#000" })
            p.text("");
            
        }
    }
})
$('#solve').on("click", function () {

    for (var x = 0; x <= 8; x++) {
        for (var y = 0; y <= 8; y++) {
            var id = "#" + x + "" + y;
            if ($(id).val() != "") {
                board[x][y] = $(id).val();
            } else {
                board[x][y] = 0;
            }
        }
    }

    sudokuSolver(board);
});


$('input').on("keyup", function () {
    var val = $(this).val();

    if (val.length > 1) {
        $(this).val(val.substr(val.length - 1, 1));
    }
    if (val <= 0 || val >= 10) {
        $(this).val("");
    }



});




// Check If the Board Is full Or Not?
function isFull(board) {
    for (var x = 0; x <= 8; x++) {
        for (var y = 0; y <= 8; y++) {
            if (board[x][y] == 0) {
                return false;
            }
        }
    }
    return true;
}

// Find All Possible Numbers
function possibileNums(board, i, j) {

    // create object of 9 elem of 0 value
    possibile = {};
    for (let n = 1; n <= 9; n++) {
        possibile[n] = 0;
    }

    // Check Row
    for (let x = 0; x < 9; x++) {
        num = board[i][x];
        if (num != 0) {
            possibile[num] = num;
        }
    }

    // Check Col
    for (let y = 0; y < 9; y++) {
        num = board[y][j];
        if (num != 0) {
            possibile[num] = num;
        }
    }

    // Check Grid
    for (let gx = Math.floor(i / 3) * 3; gx < (Math.floor(i / 3) * 3) + 3; gx++) {
        for (let gy = Math.floor(j / 3) * 3; gy < (Math.floor(j / 3) * 3) + 3; gy++) {
            num = board[gx][gy];
            if (num != 0) {
                possibile[num] = num;
            }
        }
    }

    // Chaange not possibile Numbers to zero And vise versa
    for (let np = 1; np <= 9; np++) {
        if (possibile[np] == 0) {
            possibile[np] = np;
        } else {
            possibile[np] = 0;
        }
    }
    return possibile;
}


var n = 0, t = 0;

// Sudoku Solver
function sudokuSolver(board) {
    p.text("Takes " + ++n + " Random Times" +" & Solve it " + t+" Times");

    var i = 0,
        j = 0,
        possibile = {};

    if (isFull(board)) {
        t++;
        for (var x = 0; x <= 8; x++) {
            for (var y = 0; y <= 8; y++) {
                var id = "#" + x + "" + y,
                    num = board[x][y];
                spot = $(id);
                if (spot.val() != num) {
                    spot.css({ "background-color": "blue", "color": "#fff" })
                }
                $(id).val(num);
            }
        }
        return;
    } else {

        // Find Zero Spot
        findSpot: {
            for (let x = 0; x <= 8; x++) {
                for (let y = 0; y <= 8; y++) {
                    if (board[x][y] == 0) {
                        i = x;
                        j = y;
                        break findSpot;
                    }
                }
            }
        }
        // Founded a spot of Zero Value

        // Get Possibile Numbers For This Spot
        possibile = possibileNums(board, i, j);

        // Loop For each elem in possibile
        for (let n = 1; n <= 9; n++) {

            if (possibile[n] != 0) {

                // Set this Spot To The New Value
                board[i][j] = possibile[n];

                
                changeSpot(i,j,board);

                // Call Again Sudoku Solver
                sudokuSolver(board);

            }
        }
        // Back Track
        board[i][j] = 0;
    }
}
var o = 0;
function changeSpot(i,j,board) {
    var id = "#" + i + "" + j;
    (function(){
        setTimeout(function() {
            $('p').text("yes")
            console.log($(id),++o,id,"=>",board[i][j])

        },1000)
        
    });

}
