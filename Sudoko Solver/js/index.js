// Array of Sudoku Want To solve it
var old = [
    [9, 0, 0, 6, 0, 0, 3, 0, 0],
    [0, 0, 0, 0, 0, 0, 4, 6, 9],
    [6, 0, 0, 5, 4, 0, 0, 0, 0],
    [3, 7, 8, 0, 0, 5, 0, 0, 2],
    [0, 0, 0, 7, 6, 3, 0, 1, 5],
    [0, 6, 0, 0, 2, 8, 7, 0, 4],
    [0, 3, 0, 1, 5, 7, 9, 0, 6],
    [0, 4, 5, 3, 0, 0, 1, 2, 0],
    [1, 0, 0, 0, 8, 0, 5, 0, 0]
];
var old = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0]
];
var tableSolve = $("table#solve");
// Loop For Each Rows
for (var r = 0; r <= 8; r++) {
    var content = "<tr>";
    // Loop For Each Cols

    for (var c = 0; c <= 8; c++) {
        var id = r + "" + c;
        if (old[r][c] != 0) {
            var val = old[r][c];
        } else {
            var val = "";
        }
        content +=
            '<td> <input type="text" class="form-control" id="' +
            id +
            '" value="' +
            val +
            '"> </td>';
    }
    content += "</tr>";
    tableSolve.append(content);
}

$("input").on("keyup", function() {
    if ($(this).val().length > 1) {
        $(this).val(
            $(this)
                .val()
                .slice($(this).val().length - 1, $(this).val().length)
        );
    }
});

$("button").on("click", function() {
    var sudoku = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0]
    ];

    for (var r = 0; r <= 8; r++) {
        for (var c = 0; c <= 8; c++) {
            var id = "#" + r + "" + c;
            sudoku[r][c] = Number($("table#solve input" + id).val());
        }
    }

    var times = 0;

    do {
        var sum = 0;
        // Loop For Each Rows
        for (var r = 0; r <= 8; r++) {
            // Loop For Each Cols
            for (var c = 0; c <= 8; c++) {
                // Check if the cell empty
                if (sudoku[r][c] == 0) {
                    // Object To put all Not possible Numbers
                    var notpossibile = {};

                    // Loop For Col And Rows
                    for (var cell = 0; cell < 9; cell++) {
                        // Check If Rows is not empty
                        if (sudoku[r][cell] > 0) {
                            // Add this number to the object
                            notpossibile[sudoku[r][cell]] = true;
                        }

                        // Check If Cols is not empty
                        if (sudoku[cell][c] > 0) {
                            // Add this number to the object
                            notpossibile[sudoku[cell][c]] = true;
                        }
                    }

                    // Loop For Grid rows
                    for (
                        var gridR = Math.floor(r / 3) * 3;
                        gridR < Math.floor(r / 3) * 3 + 3;
                        gridR++
                    ) {
                        // Loop For Grid Cols
                        for (
                            var gridC = Math.floor(c / 3) * 3;
                            gridC < Math.floor(c / 3) * 3 + 3;
                            gridC++
                        ) {
                            // Check if the Grid is not empty
                            if (sudoku[gridR][gridC] > 0) {
                                // Add this number to the object
                                notpossibile[sudoku[gridR][gridC]] = true;
                            }
                        }
                    }

                    // Check if there is row has 8 not possible numbers
                    if (Object.keys(notpossibile).length == 8) {
                        // Loop For Numbers 1 - 9
                        for (var n2 = 1; n2 <= 9; n2++) {
                            // Check if this number not exist
                            if (!notpossibile[n2]) {
                                // Add This number to Sudoku Array
                                sudoku[r][c] = n2;
                                console.log(r, c, n2);
                            }
                        }
                    }
                }
                sum += sudoku[r][c];
            }
        }

        console.log(times + " Time");
        times++;
        if (times >= 10) {
            $("p").html(
                "number of times = " + times + "<br> We Cant Sovle This Shit"
            );
            sum = 600;
        } else {
            $("p").html(
                "number of times = " + times + "<br> We Sovled This Shit"
            );
        }
    } while (sum < 405);

    console.log("number of times = " + times);

    var tableSolved = $("table#solved");
    var elem = "";
    // Loop For Each Rows
    for (var r = 0; r <= 8; r++) {
        var content = "<tr>";
        // Loop For Each Cols
        for (var c = 0; c <= 8; c++) {
            content +=
                '<td> <input type="text" disabled class="form-control" value=' +
                sudoku[r][c] +
                "> </td>";
        }
        content += "</tr>";
        elem += content;
    }
    tableSolved.html(elem);
});

d;
