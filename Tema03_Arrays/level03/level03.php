<?php

function ex01(array $inputArray): array{
	/*A correct Input is supposed*/
	$outputArray = array_map("myCube",$inputArray);
	return $outputArray;
}
function myCube($val): float{
	/*ASK TEAHCER - How To Accept only numeric input fields in a function definition*/
	/*Something like float/int NOT WORKING */
	/*Something like float int NOT WORKING */
	/*Something like float or int NOT WORKING */
	/*Something like float | int NOT WORKING */
	/* IS it even possible?*/
	if(is_numeric($val)){
		/*return $val^3;*/
		/*Line above not working*/
		/*return $val*$val*$val;*/
		/*Or since Documentation use pow() function*/
		return pow($val,3);
	}else{
		printf("ERROR - Not possible to apply the cube to smthing is NOT a number!");
	}
	
}


function ex02(array $inStrArray): array{
	return array_filter($inStrArray, "evenCharsBool");
}


function evenCharsBool(string $strIn){
	if(strlen($strIn)%2==0){
		return True;
	}else{
		return False;
	}
}

function ex03(array $inValsArray): int{
	
	return array_reduce($inValsArray, "sumPrimes");
}

function sumPrimes($carry, $item){
	/*WARNING - In Order To use this function instal php-gmp
	 * apt-get install phpX-gmp
	 * AND Add to file php.ini (if needed):
	 * extension=php_gmp.so
	 * */
	
	
	/*if(gmp_prob_prime($item,15) != 0 or $item==1){*/
	/* 0 -> Not Prime , 1-> Probably Prime, 2-> Surely Prime*/
	/*ASK THEACHER - Why is 1 NOT considered Prime?*/
	/*Okay... After a long PHD about the topic (2 minutes google search)
	 * 1 is NOT considered a Primer Number... What a wierd world...
	 * Therefore use conditional below*/
	if(gmp_prob_prime($item,15) != 0){
		$carry += $item;
	}
	return $carry;


}


echo "\n\nEx01 --------- \n";

$arrValues = array(1,2,3,4,5,6,7,0,-1,-2,-3,-123);
$resMap = ex01($arrValues);
echo "Array Values = ", var_dump($arrValues);
echo "Results Array Map = ", var_dump($resMap);


echo "\n\nEx02 --------- \n";
$arrStrings = array("Hi", "my", "Name", "is", "...", "sorry...", "I", "forgot", "I am really bored...");

$resFilter = ex02($arrStrings);
echo "Array Strings = ", var_dump($arrStrings);
echo "Filter Results Array Strings = ", var_dump($resFilter);



echo "\n\nEx03 --------- \n";
$arrInts = array(1,2,3,4,5,6,7,8,9,10,11);
$sumPrimes = 0.0;
$sumPrimes = ex03($arrInts);
echo "Array With Integers\n", var_dump($arrInts);
echo "Summatory Primes = ", var_dump($sumPrimes);



?>
