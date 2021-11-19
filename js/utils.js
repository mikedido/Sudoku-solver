var htmlGrid =  [
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


/**
 * Check the input is numeric
 * 
 * @param {*} event 
 * @param {*} idCell 
 * @returns 
 */
function isNumeric(event, idCell) {
    //authorized value in the cell 
    const number = ['1', '2', '3', '4', '5', '6', '7', '8', '9', 'Backspace'];

    if (!isInArray(event.key, number)) {
        return false;
    }

    let line = Math.floor(idCell.substring(5) / 9);
    let column = idCell.substring(5) % 9;

    if (event.key == "Backspace"){
        htmlGrid[line][column] = 0;
        document.getElementById(idCell).classList.remove("error");
    } else {
        htmlGrid[line][column] = event.key;
    }

    if (!isValueInHtmlGridLine(htmlGrid, line, column, event.key) || !isValueInHtmlGridColumn(htmlGrid, line, column, event.key) || !isValueInHtmlGridBloc(htmlGrid, line, column, event.key)) {
        document.getElementById(idCell).classList.add("error");
    } 
}

function isValueInHtmlGridLine(grid, line, column, value) {
    for (let j=0; j<9; j++) {
        if (grid[line][j] == value && j != column) {
            return false;
        }
    }

    return true;
}

function isValueInHtmlGridColumn(grid, line, column, value) {
    for (let i=0; i<9; i++) {
        if (grid[i][column] == value && i != line) {
            return false;
        }
   }

   return true;
}


function isValueInHtmlGridBloc(grid, line, column, value) {
    let blocLine = 3 * Math.floor(line / 3);
    let blocColumn = 3 * Math.floor(column / 3);

    for (let i=blocLine; i<blocLine+3; i++) {
        for (let j=blocColumn; j < blocColumn+3; j++) {
            if (grid[i][j] == value && i != line && j != column) {
                return false;
            }
        }
    }

    return true;
}

/**
 * Clear the grid
 *
 *
 */
 function clearGrille() {
   var allInputElements = document.getElementsByTagName('input');

   for (var element = 0; element < allInputElements.length; element++) {
        allInputElements[element].value = '';
        allInputElements[element].classList.remove("error");
   }
   
   htmlGrid =  [
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
 }


 function fillGrille() {

 }