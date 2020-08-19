import { Spot } from './Spot.js';

let option1 = [
  [2, 0, 0, 5, 0, 7, 0, 0, 0],
  [0, 0, 6, 2, 3, 0, 1, 0, 0],
  [7, 5, 3, 6, 0, 0, 0, 4, 8],
  [0, 0, 0, 8, 0, 0, 4, 5, 1],
  [3, 0, 0, 0, 6, 0, 9, 0, 2],
  [0, 8, 5, 0, 2, 0, 0, 3, 0],
  [5, 0, 1, 0, 0, 9, 6, 0, 0],
  [0, 4, 9, 7, 0, 0, 0, 0, 3],
  [8, 2, 7, 0, 0, 6, 0, 9, 0]
];

let mainSudoku = new Sudoku('mainSudoku', option1);

mainSudoku.create();

function Sudoku(name, sudoku) {
  this.sudoku = sudoku;
  this.spots = [];
  this.mainColor = 'slateblue';
  this.secColor = 'black';
  this.mainBgColor = '#fff';
  this.name = name;
  this.x = null;
  this.y = null;
  this.isValid = null;
  this.isSolved = null;
  this.solvingSteps = [];
  this.rows = null;
  this.cols = null;
  this.grids = null;
  this.gridsNumbers = [];
  this.gridsPositionsXY = [];
  this.retry = 0;
  this.steps = 0;
  this.timer = 0;

  this.create = () => {

    if (document.getElementById(this.name))
      document.getElementById(this.name).remove();

    this.spots = [];
    this.isValid = true;
    this.isSolved = false;
    this.solvingSteps = [];
    this.generateGridsNumbers();

    let xLength = this.sudoku.length;

    const sudokuElement = document.createElement('div');

    const counter = document.createElement('div');
    counter.className = 'counter';

    document.documentElement.appendChild(counter);

    sudokuElement.id = this.name;

    sudokuElement.classList.add('sudoku');

    document.documentElement.appendChild(sudokuElement);

    for (let x = 1; x <= xLength; x++) {

      const rowElement = document.createElement('div');

      rowElement.className = 'row';

      sudokuElement.appendChild(rowElement);

      let yLength = this.sudoku[x - 1].length;

      this.spots.push([]);

      for (let y = 1; y <= yLength; y++) {

        let spot = new Spot(this.name, x, y, this.sudoku[x - 1][y - 1]);

        let spotElement = spot.create();

        rowElement.appendChild(spotElement);

        this.spots[x - 1].push(spot);

      }

    }

    this.setActive(4, 4);

  }

  this.setActive = (x, y) => {
    this.x = x;
    this.y = y;
    this.spotsReactions();
  }

  this.spotsReactions = () => {

    let startGridX = this.x - (this.x % 3);
    let startGridY = this.y - (this.y % 3);

    for (let x = 0; x < this.spots.length; x++) {

      for (let y = 0; y < this.spots[x].length; y++) {

        this.spots[x][y].refresh();

        if ((x == this.x && y != this.y) || (x != this.x && y == this.y) ||
          (this.spots[x][y].value && this.spots[x][y].value == this.spots[this.x][this.y].value)
        ) {
          this.spots[x][y].highLight(true);
        }

      }

    }

    for (let x = startGridX; x <= startGridX + 2; x++) {
      for (let y = startGridY; y <= startGridY + 2; y++) {
        this.spots[x][y].highLight(true);
      }
    }

    this.spots[this.x][this.y].active(true);

    this.checkValidity();

  }

  this.changeSpotValue = (number) => {

    if (this.x == null || this.y == null || this.spots[this.x][this.y].isDisabled) return;

    this.spots[this.x][this.y].setValue('');

    if (number != 0) this.spots[this.x][this.y].setValue(number);

    this.spotsReactions();

  }

  this.checkValidity = () => {

    for (let x = 0; x < this.spots.length; x++) {

      let valuesOfRow = [];

      let invalidRowValues = [];

      for (let y = 0; y < this.spots[x].length; y++) {

        let value = Number(this.spots[x][y].value);

        if (value && valuesOfRow.indexOf(value) == -1)
          valuesOfRow.push(value);
        else if (value && invalidRowValues.indexOf(value) == -1)
          invalidRowValues.push(value);

      }

      invalidRowValues.forEach(invalidValue => {
        for (let y = 0; y < this.spots[x].length; y++) {
          let spot = this.spots[x][y];
          let currentValue = spot.value;
          if (currentValue == invalidValue)
            spot.setInvalid(true);
        }
      });

    }


    for (let x = 0; x < this.spots.length; x++) {

      let valuesOfCol = [];

      let invalidColValues = [];

      for (let y = 0; y < this.spots[x].length; y++) {

        let value = Number(this.spots[y][x].value);

        if (value && valuesOfCol.indexOf(value) == -1)
          valuesOfCol.push(value);
        else if (value && invalidColValues.indexOf(value) == -1)
          invalidColValues.push(value);

      }

      invalidColValues.forEach(invalidValue => {
        for (let y = 0; y < this.spots[x].length; y++) {
          let spot = this.spots[y][x];
          let currentValue = spot.value;
          if (currentValue == invalidValue)
            spot.setInvalid(true);
        }
      });

    }

    let startGridX = this.x - (this.x % 3);
    let startGridY = this.y - (this.y % 3);

    let valuesOfGrid = [];

    let invalidGridValues = [];

    for (let x = startGridX; x <= startGridX + 2; x++) {

      for (let y = startGridY; y <= startGridY + 2; y++) {

        let value = Number(this.spots[x][y].value);

        if (value && valuesOfGrid.indexOf(value) == -1)
          valuesOfGrid.push(value);
        else if (value && invalidGridValues.indexOf(value) == -1)
          invalidGridValues.push(value);

      }

    }

    invalidGridValues.forEach(invalidValue => {
      for (let x = startGridX; x <= startGridX + 2; x++) {
        for (let y = startGridY; y <= startGridY + 2; y++) {
          let spot = this.spots[x][y];
          if (spot.value == invalidValue)
            spot.setInvalid(true);
        }
      }
    });

  }

  this.motionHandler = (keyCode) => {

    switch (keyCode) {

      case 40:
        if (this.x + 1 < 9)
          this.x++;
        else if (this.x + 1 == 9 && this.y + 1 < 9) {
          this.y++;
          this.x = 0;
        } else if (this.x + 1 == 9 && this.y + 1 == 9)
          this.x = this.y = 0;
        break;

      case 39:

        if (this.y + 1 < 9)
          this.y++;
        else if (this.y + 1 == 9 && this.x + 1 < 9) {
          this.x++;
          this.y = 0;
        } else if (this.y + 1 == 9 && this.x + 1 == 9)
          this.y = this.x = 0;
        break;

      case 38:
        if (this.x - 1 > -1)
          this.x--;
        else if (this.x - 1 == -1 && this.y - 1 > -1) {
          this.y--;
          this.x = 8;
        } else if (this.x - 1 == -1 && this.y - 1 == -1)
          this.x = this.y = 8;
        break;

      case 37:
        if (this.y - 1 > -1)
          this.y--;
        else if (this.y - 1 == -1 && this.x - 1 > -1) {
          this.x--;
          this.y = 8;
        } else if (this.y - 1 == -1 && this.x - 1 == -1)
          this.y = this.x = 8;
        break;
    }

    this.setActive(this.x, this.y);

  }

  this.generateGridsNumbers = () => {

    for (let n = 0; n < this.sudoku.length / 3; n++)
      this.gridsNumbers.push(n * 3)

    for (let i = 0; i < this.gridsNumbers.length; i++)
      for (let j = 0; j < this.gridsNumbers.length; j++)
        this.gridsPositionsXY.push([this.gridsNumbers[i], this.gridsNumbers[j]]);

  }

  this.solve = () => {

    this.retry++;

    this.generateRowsColsGrids();

    this.checkRowsColsGrids();

    this.checkValidNumbersForEachCell();

    if (this.isMainSolved()) {

      console.log('Solved In ' + this.retry + ' Times');

      console.log(this.sudoku);

      console.log(this.solvingSteps);

    } else if (this.retry < 8) {

      this.solve();

    } else {

      console.log('We Cant Solve It in: ' + this.retry + ' Times');

      console.log(this.sudoku);

      console.log(this.solvingSteps);

    }

  }

  this.isMainSolved = () => {

    this.generateRowsColsGrids();

    if (this.rows.length != 9 || this.cols.length != 9 || this.grids.length != 9)
      return false;

    for (let n = 1; n <= 9; n++) {
      for (let x = 0; x < this.rows.length; x++)
        if (this.rows[x].indexOf(n) == -1) return false

      for (let x = 0; x < this.cols.length; x++)
        if (this.cols[x].indexOf(n) == -1) return false

      for (let x = 0; x < this.grids.length; x++)
        if (this.grids[x].indexOf(n) == -1) return false
    }

    return true;
  }

  this.generateRowsColsGrids = () => {

    this.rows = [];
    this.cols = [];
    this.grids = [];

    for (let x = 0; x < this.sudoku.length; x++) {

      let rowNumbers = [];

      for (let y = 0; y < this.sudoku[x].length; y++)
        if (this.sudoku[x][y]) rowNumbers.push(this.sudoku[x][y]);

      this.rows.push(rowNumbers);

    }

    for (let x = 0; x < this.sudoku.length; x++) {

      let colNumbers = [];

      for (let y = 0; y < this.sudoku[x].length; y++)
        if (this.sudoku[y][x]) colNumbers.push(this.sudoku[y][x]);

      this.cols.push(colNumbers);

    }

    for (let i = 0; i < this.gridsPositionsXY.length; i++) {

      let gridValues = [];

      for (let x = this.gridsPositionsXY[i][0]; x <= this.gridsPositionsXY[i][0] + 2; x++)
        for (let y = this.gridsPositionsXY[i][1]; y <= this.gridsPositionsXY[i][1] + 2; y++)
          if (this.sudoku[x][y]) gridValues.push(this.sudoku[x][y]);

      this.grids.push(gridValues);
    }

  }

  this.checkRowsColsGrids = () => {


    for (let x = 0; x < this.rows.length; x++) {

      if (this.rows[x].length != 8) continue;

      this.solveLastNumber(this.rows[x], x, 'row');

    }


    for (let x = 0; x < this.cols.length; x++) {

      if (this.cols[x].length != 8) continue;

      this.solveLastNumber(this.cols[x], x, 'col');

    }



    for (let x = 0; x < this.grids.length; x++) {

      if (this.grids[x].length != 8) continue;

      this.solveLastNumber(this.grids[x], x, 'grid');

    }

  }

  this.solveLastNumber = (array, positionX, type) => {

    let numberMissing = null;

    for (let i = 1; i <= array.length + 1; i++)
      if (array.indexOf(i) == -1) numberMissing = i;

    if (type == 'row')
      for (let y = 0; y < this.sudoku[positionX].length; y++)
        if (!this.sudoku[positionX][y]) this.addSolveStep(positionX, y, numberMissing)

    if (type == 'col')
      for (let x = 0; x < this.sudoku[positionX].length; x++)
        if (!this.sudoku[x][positionX]) this.addSolveStep(x, positionX, numberMissing);

    if (type == 'grid')
      for (let x = this.gridsPositionsXY[positionX][0]; x <= this.gridsPositionsXY[positionX][0] + 2; x++)
        for (let y = this.gridsPositionsXY[positionX][1]; y <= this.gridsPositionsXY[positionX][1] + 2; y++)
          if (!this.sudoku[x][y]) this.addSolveStep(x, y, numberMissing);

  }

  this.checkValidNumbersForEachCell = () => {

    for (let CX = 0; CX < this.sudoku.length; CX++) {

      for (let CY = 0; CY < this.sudoku.length; CY++) {

        if (this.sudoku[CX][CY]) continue;

        let cSpot = this.spots[CX][CY];

        cSpot.invalidNumbers = [];
        cSpot.validNumbers = [];

        numbers: for (let n = 1; n <= 9; n++) {

          for (let x = 0; x < this.sudoku.length; x++) {
            if (this.sudoku[x][CY] == n) {
              cSpot.invalidNumbers.push(n);
              continue numbers;
            }
          }

          for (let y = 0; y < this.sudoku[CX].length; y++) {
            if (this.sudoku[CX][y] == n) {
              cSpot.invalidNumbers.push(n);
              continue numbers;
            }
          }


          let startGridX = CX - (CX % 3);
          let startGridY = CY - (CY % 3);

          for (let x = startGridX; x <= startGridX + 2; x++) {
            for (let y = startGridY; y <= startGridY + 2; y++) {
              if (this.sudoku[x][y] == n) {
                cSpot.invalidNumbers.push(n);
                continue numbers;
              }
            }
          }

        }

        for (let n = 1; n <= 9; n++)
          if (cSpot.invalidNumbers.indexOf(n) == -1)
            cSpot.validNumbers.push(n);

        if (cSpot.validNumbers.length == 1)
          this.addSolveStep(cSpot.x - 1, cSpot.y - 1, cSpot.validNumbers[0])
      }

    }

  }

  this.addSolveStep = (x, y, numberMissing) => {
    this.solvingSteps.push([x, y, numberMissing]);
    this.sudoku[x][y] = numberMissing;
    // console.log([x, y, numberMissing]);

  }

  this.generateValidNumbersForEachCell = () => {

    for (let CX = 0; CX < this.sudoku.length; CX++) {

      for (let CY = 0; CY < this.sudoku.length; CY++) {

        if (this.sudoku[CX][CY]) continue;

        let cSpot = this.spots[CX][CY];

        cSpot.invalidNumbers = [];
        cSpot.validNumbers = [];

        numbers: for (let n = 1; n <= 9; n++) {

          for (let x = 0; x < this.sudoku.length; x++) {
            if (this.sudoku[x][CY] == n) {
              cSpot.invalidNumbers.push(n);
              continue numbers;
            }
          }

          for (let y = 0; y < this.sudoku[CX].length; y++) {
            if (this.sudoku[CX][y] == n) {
              cSpot.invalidNumbers.push(n);
              continue numbers;
            }
          }


          let startGridX = CX - (CX % 3);
          let startGridY = CY - (CY % 3);

          for (let x = startGridX; x <= startGridX + 2; x++) {
            for (let y = startGridY; y <= startGridY + 2; y++) {
              if (this.sudoku[x][y] == n) {
                cSpot.invalidNumbers.push(n);
                continue numbers;
              }
            }
          }

        }

        for (let n = 1; n <= 9; n++)
          if (cSpot.invalidNumbers.indexOf(n) == -1)
            cSpot.validNumbers.push(n);

      }
    }
  }

  this.solvingBT = () => {

    if (this.isMainSolved()) return this.solved();

    this.generateValidNumbersForEachCell();

    let nextX;
    let nextY;

    zeroSpot: for (let CX = 0; CX < this.sudoku.length; CX++) {

      for (let CY = 0; CY < this.sudoku.length; CY++) {

        if (!this.sudoku[CX][CY]) {
          nextX = CX;
          nextY = CY;
          break zeroSpot;
        }

      }

    }

    let cSpot = this.spots[nextX][nextY];

    for (let i = 0; i < cSpot.validNumbers.length; i++) {

      this.addSolveStep(nextX, nextY, cSpot.validNumbers[i]);

      let x = nextX;
      let y = nextY;
      let v = cSpot.validNumbers[i] || '';

      setTimeout(() => {
        this.steps++;
        let counter = document.getElementsByClassName('counter');
        counter[0].innerHTML = this.steps + ' Steps to solve it.';
        this.x = x;
        this.y = y;
        this.changeSpotValue(v);
      }, this.timer);

      this.timer += 30;

      this.solvingBT();

    }

    this.addSolveStep(nextX, nextY, 0);


  }

  this.solved = () => {
    // alert('it solved')
    // console.log(this.sudoku.map(a => a.slice()));
    // console.log(this.solvingSteps);
    this.animateSolving();
    return true;
  }

  this.animateSolving = () => {

    let timer = 0;

    this.solvingSteps.forEach(step => {
      let x = step[0];
      let y = step[1];
      let v = step[2] || '';
      setTimeout(() => {
        this.steps++;
        let counter = document.getElementsByClassName('counter');
        counter[0].innerHTML = this.steps + ' Steps to solve it.';
        this.x = x;
        this.y = y;
        this.changeSpotValue(v);
        // this.spots[x][y].setValue(v);
      }, timer);

      timer += 30;

    });
  }

}

document.addEventListener('mousedown', handleMouseDown);

document.addEventListener('keydown', handleKeyDown);

function handleMouseDown(e) {
  if (e.target && e.target.classList.value.includes('spot')) {
    let spot = e.target;
    let XY = spot.id.split('-');
    let sudoku = eval(XY[0]);
    sudoku.setActive(XY[1] - 1, XY[2] - 1);
  }
}


function handleKeyDown(e) {

  let name = "mainSudoku";

  let sudoku = eval(name);

  if (!isNaN(Number(e.key)) || e.keyCode == 8) {

    let number = (e.keyCode == 8) ? 0 : e.key;

    sudoku.changeSpotValue(number);

  }

  switch (e.keyCode) {
    case 40:
    case 39:
    case 38:
    case 37:
      sudoku.motionHandler(e.keyCode);
      break;
    case 82:
      sudoku.create();
      break;
    case 83:
      sudoku.solvingBT();
      break;
  }


}





