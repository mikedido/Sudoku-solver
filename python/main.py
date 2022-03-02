
class sudokuPuzzle:
    """
    Suduko puzzle class
    """
    def __init__(self, grid):
        self.grid = grid
        
    def display_matrice(self):
        """
        Display the matrice
        """
        for i in range(9):
            for j in range(9):
                print(self.grid[i][j], end=' ')
            print()

    def is_value_absent_column(self, value, column_number) -> bool:
        """
        Check if the value exist in the column
        """
        for i in range(9):
            if self.grid[i][column_number] == value :
                return False

        return True

    
    def is_value_absent_line(self, value, line_number) -> bool:
        """
        Check if the value exist in the line
        """
        for j in range(9):
            if self.grid[line_number][j] == value :
                return False

        return True


    def is_value_absent_bloc(self, value, line_number, column_number) -> bool:
        """
        Check if the value exist in the bloc 3x3
        """
        index_line = (3 * (line_number % 3))
        index_column = (3 * (column_number % 3))

        for i in range(index_line, index_line + 3):
            for j in range(index_column, index_column + 3):
                
                if self.grid[i][j] == value:
                    return False

        return True

    def solve(self, row, column) -> bool:

        if (row == 8 and column == 9):
            return True

        if (column == 9):
            row +=1
            column = 0

        if (0 != self.grid[row][column]):
            return self.solve(row, column + 1)

        for number in range(1, 10) :
            if self.is_value_absent_line(number, row) and self.is_value_absent_column(number, column) and self.is_value_absent_bloc(number, row, column):
                self.grid[row][column] = number

                if self.solve(row, column + 1) :
                    return True

            self.grid[row][column] = 0

        return False
    

    def solve2(self) -> bool:
        resolved = False

        while (not resolved):

            all_cells_possibilities = []

            for i in range(9):
                for j in range(9):
                    if (0 == self.grid[i][j]) : 
                        all_cells_possibilities.append({
                            'row_index': i,
        	                'column_index': j,
        	                'permissible': self.get_cell_posibilities(i, j)
                        })
            
            if len(all_cells_possibilities) == 0 :
                resolved = True

            #trier le tableau des possibilités sur le champs permissible
            all_cells_possibilities.sort(key=lambda x: len(x['permissible']), reverse=False)

            if (len(all_cells_possibilities[0]['permissible'])) == 1:
                value = all_cells_possibilities[0]['permissible']
                self.grid[all_cells_possibilities[0]['row_index']][all_cells_possibilities[0]['column_index']] = value[0]
                continue

            for value in all_cells_possibilities[0]['permissible']:
                self.grid[all_cells_possibilities[0]['row_index']][all_cells_possibilities[0]['column_index']] = value
                if (self.solve()) :
                    self.solve()

            resolved = False
            return resolved

   
"""
Main programe
"""
matrice_init= [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0]
    ]

puzzle = sudokuPuzzle(matrice_init)

if puzzle.solve(0, 0):
    puzzle.display_matrice()
else : 
    puzzle.grid

