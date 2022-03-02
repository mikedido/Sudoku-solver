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

    if (event.key == "Backspace") {
        htmlGrid[line][column] = 0;
        document.getElementById(idCell).classList.remove("error");
        document.getElementById(idCell).classList.remove("cell-fill");
    } else {
        htmlGrid[line][column] = event.key;
        document.getElementById(idCell).classList.add("cell-fill");

    }

    if (isValueInHtmlGridLine(htmlGrid, line, column, event.key) || isValueInHtmlGridColumn(htmlGrid, line, column, event.key) || isValueInHtmlGridBloc(htmlGrid, line, column, event.key)) {
        document.getElementById(idCell).classList.remove("cell-fill");
        document.getElementById(idCell).classList.add("error");
    } 
}

function isValueInHtmlGridLine(grid, line, column, value) {
    for (let j = 0; j < 9; j++) {
        if (grid[line][j] == value && j != column) {
            return true;
        }
    }

    return false;
}

function isValueInHtmlGridColumn(grid, line, column, value) {
    for (let i = 0; i < 9; i++) {
        if (grid[i][column] == value && i != line) {
            return true;
        }
   }

   return false;
}


function isValueInHtmlGridBloc(grid, line, column, value) {
    let blocLine = 3 * Math.floor(line / 3);
    let blocColumn = 3 * Math.floor(column / 3);

    for (let i = blocLine; i < blocLine + 3; i++) {
        for (let j = blocColumn; j < blocColumn + 3; j++) {
            if (grid[i][j] == value && i != line && j != column) {
                return true;
            }
        }
    }

    return false;
}

function clearGrid() {
    let allInputGridElements = document.getElementsByTagName('input');
  
    for (let element = 0; element < allInputGridElements.length; element++) {
      allInputGridElements[element].value = '';
      allInputGridElements[element].classList.remove("error");
      allInputGridElements[element].classList.remove("cell-fill");
    }
  
    activateButtonByName('btn-resolve');
    showMessage('');
    
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

function deactivateButtonByName(buttonName) {
    let btnResolve = document.getElementById(buttonName);
    
    btnResolve.classList.add('disabled');
    btnResolve.classList.remove('active');
}

function activateButtonByName(buttonName) {
    let btnResolve = document.getElementById(buttonName);
    
    btnResolve.classList.add('enabled');
    btnResolve.classList.add('active');
    btnResolve.classList.remove('disabled');
}


function fillGrid(grid) {
    let cellNumber = 0;

    for(let i=0; i < 9; i++) {
        for(let j=0; j < 9; j++) {
            element = document.getElementById('cell-'+cellNumber);
            element.value = grid[i][j];
            cellNumber++;
        }
    }
}

function isInArray(value, array) {  
    return array.indexOf(value) > -1;
}
  
function showMessage(message) {
    let elementMessage = document.getElementById('message-error');
  
    elementMessage.innerHTML = message;
}
  
function isValid(grid) {

    for (let i=0; i < 9; i++) {
        for (let j=0; j < 9; j++) {
            if (0 != grid[i][j]) {
                if (isValueInHtmlGridColumn(grid, i, j, grid[i][j])
                || isValueInHtmlGridLine(grid, i, j, grid[i][j])
                || isValueInHtmlGridBloc(grid, i, j, grid[i][j])) 
    
                return false;
            }
        }
    }

    return true;
}