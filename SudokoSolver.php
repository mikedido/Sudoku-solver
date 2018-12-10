<?php

class SudokoSolver {
	
	private $grille;

	private $comming_arr = array();


	function __construct(array $grilleToSolve)
	{
		$this->grille = $grilleToSolve;

	}

	private function isAbsentLine($value, $line)
	{
    	for ($j=0; $j<9; $j++) {
        	if ($value == $this->grille[$line][$j]) {
            	return false;
        	}
    	}

    	return true;
	}
	
	private function isAbsentColumn($value, $column)
	{
	    for ($i=0; $i<9; $i++) {
	        if ($value == $this->grille[$i][$column]) {
	            return false;
	        }
	    }
	
	    return true;
	}

	private function isAbsentBloc($value, $line, $column)
	{
	    $kline = intval($line/3);
	    $kcolumn = intval($column/3);
	
	    for($i=3*$kline; $i < (3*$kline)+3; $i++) {
	        for ($j=3*$kcolumn; $j < (3*$kcolumn)+3; $j++) {
	            if ($value == $this->grille[$i][$j]) {
	                return false;
	            }
	        }
	    }
	
	    return true;
	}

	public function getPossibilitiesCell($index_line, $index_column)
	{
		$values = [];

		for ($i=1; $i<=9; $i++) {
			if ($this->isAbsentBloc($i, $index_line, $index_column) && $this->isAbsentLine($i, $index_line) && $this->isAbsentColumn($i, $index_column)) {
				$values[] = $i;
			}
		}

		return $values;
	}

	/**
	 * Function to display the grid
	 *
	 *
	 */
	public function getResult()
	{
		echo "\n";

        foreach ($this->comming_array as $row) {
            foreach ($row as $value) {
                echo $value . ' ';
            }

            echo "\n";
        }
	}

	/**
	 * Function to check the values of the grid
	 *
	 *
	 */
	public function checkGridValues()
	{
		for ($i=0; $i < 9; $i++) {
			for ($j=0; $j < 9; $j++) {
				if ($this->grille[$i][$j] > 9 || $this->grille[$i][$j] < 0) {
					
					echo 'Grid value or values error';

					return false;	
				}
			}
		}

		return true;
	}

	/**
	 * Function to solve the grid
	 *
	 *
	 */
	public function solve()
	{
		if (!$this->checkGridValues()) {
			return;
		}

		$this->comming_array = $this->grille;
		
		//fill cell of possibilities
		$allCellpossibilities = [];
		for ($i=0; $i < 9; $i++) {
			for ($j=0; $j < 9; $j++) {
				if (0 == $this->comming_array[$i][$j]) {
					$allCellpossibilities[] = array(
                            'rowIndex' 	  => $i,
                            'columnIndex' => $j,
                            'permissible' => $this->getPossibilitiesCell($i, $j)
                        );
				}
			}
		}

		if (empty($allCellpossibilities)) {

			return $this->grille;
		}

		//trier le tableau des possibilites

		//affecter la valeur à la cellule 

		//refaire le meme traitement traiement
		var_dump($allCellpossibilities); die;

	}
}