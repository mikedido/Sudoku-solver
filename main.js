/**
 * Algorithme soduku resolving : backtracking
 */
function main() {
    if (!isValid(htmlGrid)) {
      //show message
      showMessage('The grid is wrong. Please clean it');
      return;
    }
    // desactiver le bouton
    deactivateButtonByName('btn-resolve');
    
    //lunch de algos
    let grid = new SudokuPuzzle(htmlGrid);
    if (grid.solve2(0, 0)) {
      //show the grid in the html
      fillGrid(grid.get());

    } else {
      //show message error.
      showMessage('no solution  exists');
    }
}