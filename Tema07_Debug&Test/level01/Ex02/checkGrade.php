<?php

function checkGrade($grade){
	$varDivision = False;
	if($grade >= 60){
		$varDivision = "Primera Divisió";
	}elseif($grade >= 45){
		$varDivision = "Segona Divisió";
	}elseif($grade >= 33){
		$varDivision = "Tercera Divisió";
	}else{
		$varDivision = "Suspes";
	}	
	
	return $varDivision;
}

?>
