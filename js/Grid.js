/**
 * @description Grid class
 */
export default class grid {

    constructor() {
        this.cells = [
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

    isValueInLine(value, lineNumber) {
        for (let j=0; j < 9; j++) {
        	if (value == this.this.cells[lineNumber][j]) {
            	return false;
        	}
    	}

    	return true;
    }

    isValueInColumn(value, columnNumber) {
        for (let i=0; i<9; i++) {
	        if (value == this.cells[i][columnNumber]) {
	            return false;
	        }
	    }
	
	    return true;
    }

    isValueInBloc(value, lineNumber, columnNumber) {
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

    getPossibilitiesCell(indexLine, indexColumn) {
        let possbilityValues = [];

		for (let i=1; i<=9; i++) {
			if (this.isValueInBloc(i, indexLine, indexColumn) && this.isValueInLine(i, indexLine) && this.isValueInColumn(i, indexColumn)) {
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
}