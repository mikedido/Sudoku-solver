<?php

session_write_close();

ini_set ('max_execution_time', 0);

include('SudokoSolver.php');

$grille = json_decode($_POST['grid']);

$sudo = new SudokoSolver();

$sudo->solve($grille);

echo json_encode(
	array(
		'grid' => $sudo->getResultArray(),
		'time' => $sudo->getTimeExecution()
));