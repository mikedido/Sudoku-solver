/**
 * @description SudokuPuzzle class
 */
class SudokuPuzzle {

    constructor(cells) {
        this.cells = cells;
    }

    /**
     * 
     * @param {Integer} value 
     * @param {Integer} lineNumber
     * 
     * @returns {String}
     */
    isValueNotExistInLine(value, lineNumber) {
        for (let j=0; j < 9; j++) {
        	if (value == this.cells[lineNumber][j]) {
            	return false;
        	}
    	}

    	return true;
    }
    
    /**
     * 
     * @param {Integer} value 
     * @param {Integer} columnNumber 
     * 
     * @returns {Boolean}
     */
    isValueNotExistInColumn(value, columnNumber) {
        for (let i=0; i<9; i++) {
	        if (value == this.cells[i][columnNumber]) {
	            return false;
	        }
	    }
	
	    return true;
    }

    /**
     * 
     * @param {Integer} value 
     * @param {Integer} lineNumber 
     * @param {Integer} columnNumber 
     * 
     * @returns {Boolean} 
     */
    isValueNotExistInBloc(value, lineNumber, columnNumber) {

        const kline = 3 * Math.trunc(lineNumber/3);
	    const kcolumn = 3 * Math.trunc(columnNumber/3);
	
	    for(let i=kline; i < kline + 3; i++) {
	        for (let j=kcolumn; j < kcolumn + 3; j++) {
	            if (value == this.cells[i][j]) {
	                return false;
	            }
	        }
	    }
	
	    return true;
    }

    /**
     * 
     * @param {Integer} indexLine 
     * @param {Integer} indexColumn 
     * 
     * @returns {Boolean}
     */
    getPossibilitiesCell(indexLine, indexColumn) {
        let possbilityValues = [];

		for (let i=1; i<=9; i++) {
			if (this.isValueNotExistInBloc(i, indexLine, indexColumn) && this.isValueNotExistInLine(i, indexLine) && this.isValueNotExistInColumn(i, indexColumn)) {
				possbilityValues.push(i);
			}
		}

		return possbilityValues.sort(() => Math.random() - 0.5); //shuffle the result
    }

    show() {
        console.log('\n');

        this.cells.forEach(row => {
            row.forEach(item => {
                console.log(item + '');
            })

            console.log('\n');
        })
    }

    clear() {
        this.cells =  [
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

    solve(row, column) {
        if (8 == row && 9 == column) return true;

        if (column == 9) {
            row++;
            column = 0;         
        }

        if (0 != this.cells[row][column]) {
            return this.solve(row, column + 1);
        }

        for (let number = 1; number < 10; number++) {
            
            if (this.isValueNotExistInBloc(number, row, column) && this.isValueNotExistInColumn(number, column) && this.isValueNotExistInLine(number, row)) {
                this.cells[row][column] = number;

                if (this.solve(row, column +1)) {
                    return true;
                }
            }

            this.cells[row][column] = 0;
        }

        return false;
    }

    get() {
        return this.cells;
    }
}

module.exports = SudokuPuzzle;