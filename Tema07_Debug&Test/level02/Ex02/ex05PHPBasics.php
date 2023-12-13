<?php
	
	
function ex01()
{
	$intVar = 10;
	$doubleVar = 10.0;
	$stringVar = "hallo!!!";
	$boolVar = False;
	
	printf("%%intVar = %d \n",$intVar);
	printf("%%doulbeVar = %f \n", $doubleVar);
	printf("%%stringVar = %s \n", $stringVar);
	printf("%%boolVar = %d \n",$boolVar);
	$boolVar = True;
	printf("%%boolVar = %d \n",$boolVar);
	
}

function ex01_2(){
	define("myName","JustTheDude");
	echo myName, "\n";
	$constVar = constant("myName");
	echo $constVar, "\n";
	$constVar = "NotTheDudeMaybeAnotherDude";
	echo $constVar,  "\n";
	/*REMEMBER
	 * constant() does not make the value of a variable constant,
	 * It retrieves the value of a constant variable given the variable name
	 * The constant variable is defined using the function define()
	 */
	
}

function ex02(){
	$stringToPrint = "Hello, World!";
	printf("%s\n", $stringToPrint);
	echo $stringToPrint, "\n";
	
	
	/*$stringToPrintUpperCase = IntlChar::toupper($stringToPrint);*/
	$stringToPrintUpperCase = strtoupper($stringToPrint);
	printf("%s\n", $stringToPrintUpperCase);
	
	printf("Length String = %d\n",strlen($stringToPrint));
	
	$stringReversed = strrev($stringToPrint);
	printf("Reversed string: %s \n",$stringReversed);
	
	$strTwo = "Aquest és el curs de PHP";
	$strCat = $stringToPrint . $strTwo;
	printf("Concatenation of two variables: %s \n", $strCat);
}

function ex03(){
	$X = 1;
	$Y = 2;
	
	$N = 1.0;
	$M = 2.0;
	
	printf("X = %d; Y=%d\n", $X, $Y);
	printf("X + Y = %d\n", $X+$Y);
	printf("X - Y = %d\n", $X-$Y);
	printf("X * Y = %d\n", $X*$Y);
	printf("X %% Y = %d\n", $X%$Y);
	
	printf("N = %f; M=%f\n", $N, $M);
	printf("N + M = %f\n", $N+$M);
	printf("N - M = %f\n", $N-$M);
	printf("N * M = %f\n", $N*$M);
	printf("N %% M = %f\n", $N%$M);
	
	printf("2*X = %d\n", 2*$X);
	printf("2*Y = %d\n", 2*$Y);
	printf("2*N = %f\n", 2*$N);
	printf("2*M = %f\n", 2*$M);
	
	printf("Summatory = %f\n", $X+$Y+$N+$M);
}

function calculator($A,$B,$Op){
	
	$Result = 0.0;
	switch($Op){
		case '+':
			$Result = $A + $B;
			break;
		case '-':
			$Result = $A - $B;
			break;
		case '*':
			$Result = $A * $B;
			break;
		case '/':
			if($B != 0){
				$Result = $A / $B;
			}else{
				echo "It is impossible to do a divition by Zero... my dear Hero...\n";
				return;
			}
			break;
		case '%':
			if($B != 0){
				$Result = $A % $B;
			}else{
				echo "It is impossible to do a modulus by Zero... my dear Hero...\n";
				return;
			}
			break;
		default:
			echo "The given operation is not allowed";		
	}
	printf("The result of A=%f and B=%f with the operator: %s is equal to: %f\n",$A, $B, $Op, $Result);
	
		
	return $Result;
}

function myCount(
	$end = 10,
	$step = 1){
	
	printf("Dos mes dos mes dos vine a comptar amb nosaltreeees!\n");
	printf("I am counting... ");
	for($i = 0; $i<= $end; $i=$i+ $step){
		printf("%d\n", $i);	
	}
}

function checkGrade($grade){
	$varDivision = False;
	if($grade >= 60){
		$varDivision = "Primera Divisió";
	}elseif($grade >= 45){
		$varDivision = "Segona Divisió";
	}elseif($grade >= 33){
		$varDivision = "Tercera Divisió";
	}else{
		$varDivision = "OMG You need to work harder! Good luck next time!";
	}	
	
	printf("Grade: %d Divisió: %s\n",$grade, $varDivision);
}

function isBitten(){
	/*
	 *     Note: There is no need to seed the random number generator with srand() or mt_srand() as this is done automatically. 
	 */
	$bite = rand(0,1);
	$biteBool = False;
	switch($bite){
		case 0:
			$biteBool = False;
			break;
		case 1:
			$biteBool = True;
			break;
		default:
			printf("ERROR - isBitten - Random value different than 0 and 1.");			
	}
	return $biteBool;
}

ex01();
ex01_2();
echo "\nExercise 02:\n";
ex02();

echo "\nExercise 03:\n";
ex03();
echo "Calculator 4 and 3 and *";
calculator(4,3,"+");
calculator(4,3,"-");
calculator(4,3,"*");
calculator(4,3,"/");
calculator(4,0,"/");
calculator(4,3,"%");
calculator(4,0,"%");


echo "\nExercise 04:\n";
myCount();
myCount(14, 3);

echo "\nExercise 05:\n";

checkGrade(70);
checkGrade(60);
checkGrade(59);
checkGrade(50);
checkGrade(45);
checkGrade(44);
checkGrade(40);
checkGrade(33);
checkGrade(0);

echo "\nExercise 06:\n";
$triesAmount = 100000;
$resArray = [];
/*"Throw the coin X times*/
for($i=0; $i<$triesAmount; $i++){
	$resArray[] = isBitten();
}

$sumTrues = 0;
$summFalses = 0;
for($i=0; $i<$triesAmount; $i++){
	switch($resArray[$i]){
		case False:
			$sumFalses ++;
			break;
		case True:
			$sumTrues ++;
			break;
		default:
			printf("ERROR - Value of array element NOT expected!");
	}
}

if(($sumTrues + $sumFalses)!=$triesAmount){
	printf("ERROR - Different amount of values!");
}

$probTrue = $sumTrues / $triesAmount;
$probFalse = $sumFalses / $triesAmount;

printf("Exeperimental True Probability = %f\n",$probTrue);
printf("Exeperimental False Probability = %f\n",$probFalse);




?>
