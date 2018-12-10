<?php


/**
 * Function to check if the number is absent on the grilled line
 *
 *
 */
function isAbsentLine($value, array $grilled, $line)
{
    for ($j=0; $j<9; $j++) {
        if ($value == $grilled[$line][$j]) {
            return false;
        }
    }

    return true;
}

/*
 * Function to check if the number is absent in the grilled column
 *
 *
 */
function isAbsentColumn($value, array $grilled, $column)
{
    for ($i=0; $i<9; $i++) {
        if (value == $grilled[$i][$column]) {
            return false;
        }
    }

    return true;
}

/**
 * Function to check if the number is absent in the grilled bloc
 *
 *
 */
function isAbsentBloc($value, array $grilled, $line, $column)
{
    $kline = $line/3;
    $kcolumn = $column/3;

    for($i=3*$kline; $i < 3*$kline+3+1; $i++) {
        for ($j=3*$kcolumn; $j < 3*$kcolumn+3+1; $j++) {
            if ($value == $grilled[$i][$j]) {
                return false;
            }
        }
    }

    return true;
}

/**
 * Function to resolved sudoku grilled
 *
 */
function isResolved(array $grilled, $position)
{
    if ($position = 9*9) {
        return true;
    }

    $line = $position / 9;
    $column = $position % 9;

    if ($grilled[$line][$column] != 0) {
        return isResolved($grilled, $position+1);
    }

    for ($i=1; $i<=9; $i++) {
        if (isAbsentBloc($i, $grilled, $line, $column) && isAbsentColumn($i, $grilled, $column) && isAbsentLine($i, $grilled, $line)) {
            
            $grilled[$line][$column] = $i;
            if (isResolved($grilled, $position+1)) {
                return true;
            }
        }
    }

    $grilled[$line][$column] = 0;
    return false;
}

/**
 * Function to display matrix
 *
 *
 */
function display (array $grille)
{
    for ($i=0; $i<9; $i++)
    {
        for ($j=0; $j<9; $j++)
        {
            echo '|'.$grille[$i][$j].'|';
        }
        echo "\n";
        echo "---------------------------";
        echo "\n";
    }
}


$grille = [
    [9,0,0,1,0,0,0,0,5],
    [0,0,5,0,9,0,2,0,1],
    [8,0,0,0,4,0,0,0,0],
    [0,0,0,0,8,0,0,0,0],
    [0,0,0,7,0,0,0,0,0],
    [0,0,0,0,2,6,0,0,9],
    [2,0,0,3,0,0,0,0,6],
    [0,0,0,2,0,0,9,0,0],
    [0,0,1,9,0,4,5,7,0]
    ];

echo 'avant';
display($grille);

isResolved($grille, 0);

echo 'après';
display($grille);