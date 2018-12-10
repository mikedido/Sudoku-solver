<?php


/**
 * Function to check if the number is absent on the grilled line
 *
 *
 */
function isAbsentLine(value, array grilled, line)
{
    for (j=0; j<9; j++) {
        if (value == grilled[line][j]) {
            return false
        }
    }

    return true;
}

/*
 * Function to check if the number is absent in the grilled column
 *
 *
 */
function isAbsentColumn(value, array grilled, column)
{
    for (i=0; i<9; i++) {
        if (value == grilled[i][column]) {
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
function isAbsentBloc(value, grilled, line, column)
{
    
}

/**
 * Function to resolved sudoku grilled
 *
 */
function isResolved(value, grilled, position)
{

}
