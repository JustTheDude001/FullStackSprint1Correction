<?php

function ex01(): void{
	$arrayVar = [];
	$arrayVar[] = 1;
	$arrayVar[] = 2;
	$arrayVar[] = 3;
	$arrayVar[] = 4;
	$arrayVar[] = 5;
	
	for($i=0; $i<count($arrayVar); $i++){
		printf("Array value for index %d = %d\n", $i, $arrayVar[$i]);
	}
}

function ex02():void{
	$X = array (10, 20, 30, 40, 50,60);
	
	printf("Size of Array X = %d\n", count($X));
	
	$item = rand(0, count($X)-1);
	unset($X[$item]);
	printf("Size of Array X = %d\n", count($X));
	
}

function myEx02():void{
	$X = array (10, 20, 30, 40, 50,60);
	
	printf("Size of Array X = %d\n", count($X));
	
	$initCount = count($X);
	for($i=0; $i<$initCount; $i++){
		$item = rand(0, count($X)-1);
		unset($X[$item]);
		printf("Size of Array X = %d\n Index to Unset = %d\n\n", count($X), $item);
	}	
}

function ex02_as(){
	$X = array (10, 20, 30, 40, 50,60);
	
	printf("Size of Array X = %d\n", count($X));
	
	$item = rand(0, count($X)-1);
	array_splice($X,$item,1);
	printf("Size of Array X = %d\n", count($X));
}

function myEx02_as():void{
	$X = array (10, 20, 30, 40, 50,60);
	
	printf("Size of Array X = %d\n", count($X));
	
	$initCount = count($X);
	for($i=0; $i<$initCount; $i++){
		$item = rand(0, count($X)-1);
		array_splice($X,$item,1);
		printf("Size of Array X = %d\n Index to Unset = %d\n\n", count($X), $item);
	}	
}

/*REMEMBER FOR ARRAYS USE ARRAY_SPLICE INSTEAD OF UNSET*/
/*UNSET BRINGS PROBLEMS TO THE TABLE*/



function ex03($wordsArray,$isChar):bool{
	
	/*$isThere = True;*/
	for($el=0; $el<count($wordsArray); $el++){
		if(stristr($wordsArray[$el], $isChar) == False){
			return False;
		}
	}
	/*return $isThere*/
	return True;

}

function ex04(): void{
	$myself = array("Name"=>"JustTheDude", "Age"=>"11110", "Email"=>"itIsNotMyEmail@NotMyEmail.gg", "FavFood"=>"WhatTheOthersEat");
	
	printf("myself Name %s\n", $myself["Name"]);
	printf("myself Age %s\n", $myself["Age"]);
	printf("myself Email %s\n", $myself["Email"]);
	printf("myself Favourite Food %s\n", $myself["FavFood"]);
	
	
}

function ex04v2(): void{
	$myself = [];
	$myself["Name"] = "JustTheDude";
	$myself["Age"] = "11110"; 
	$myself["Email"] = "itIsNotMyEmail@NotMyEmail.gg";
	$myself["FavFood"] = "WhatTheOthersEat";
	
	printf("myself Name %s\n", $myself["Name"]);
	printf("myself Age %s\n", $myself["Age"]);
	printf("myself Email %s\n", $myself["Email"]);
	printf("myself Favourite Food %s\n", $myself["FavFood"]);
	
	
}


function ex04v3(): void{
	$myself = [];
	$myself["Name"] = "JustTheDude";
	$myself["Age"] = 30; 
	$myself["AgeBin"] = 0b11110; 
	$myself["Email"] = "itIsNotMyEmail@NotMyEmail.gg";
	$myself["FavFood"] = "WhatTheOthersEat";
	
	printf("myself Name %s\n", $myself["Name"]);
	printf("myself Age %s\n", $myself["Age"]);
	printf("myself Age Bin %s\n", $myself["AgeBin"]);
	printf("myself Email %s\n", $myself["Email"]);
	printf("myself Favourite Food %s\n", $myself["FavFood"]);
	
	
}


echo "\n\nEx01 --------- \n";
ex01();

echo "\n\nEx02 --------- \n";
ex02();

echo "\n\nMyEx02 --------- \n";
myEx02();

echo "\n\nEx02 ARRAY SPLICE --------- \n";
ex02_as();

echo "\n\nMyEx02 ARRAY SPLICE --------- \n";
myEx02_as();

echo "\n\nEx03 --------- \n";
$wordsArrayOne = array("hola", "Php", "Html");
echo "WordsArrayOne = ", var_dump($wordsArrayOne), " char = h -->";
echo "ex03 = ". ex03($wordsArrayOne, "h") ? 'True':'False', "\n";
echo "\n";
echo "WordsArrayOne = ". var_dump($wordsArrayOne)." char = l -->";
echo "ex03 = ", ex03($wordsArrayOne, "l") ? 'True':'False', "\n";

echo "\n\nEx04 --------- \n";
ex04();
echo "\n\nEx04 version 2 --------- \n";
ex04v2();

echo "\n\nEx04 Is It Possible?¿--------- \n";
ex04v3();

?>
