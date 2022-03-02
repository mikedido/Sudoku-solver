/**
 * Algorithme soduku resolving : backtracking
 */
function main() {
    if (!isValid(htmlGrid)) {
      showMessage('The grid is wrong. Please clean it');
      return;
    }

    deactivateButtonByName('btn-resolve');
    
    let grid = new SudokuPuzzle(htmlGrid);
    if (grid.solve(0, 0)) {
      //show the grid in the html
      fillGrid(grid.get());

    } else {
      showMessage('no solution  exists');
    }
}