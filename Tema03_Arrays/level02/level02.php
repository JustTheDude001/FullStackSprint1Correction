<?php


function ex01_int(): void{
	$arrInt = array(15,1, 2, 3, 4, 3, 6, 7, 8, 9 ,10,21);
	$arrIntTwo = array(1, 2, 3, 4, 5, 6, 7, 8, 9 ,10);

	$arrIntersectionInt = [];
	$arrIntersectionInt = array_intersect($arrInt, $arrIntTwo);
	
	$arrDiffInt = [];
	$arrDiffInt = array_diff($arrInt, $arrIntTwo);
	$arrDiffIntTwo = array_diff($arrIntTwo, $arrInt);
	
	echo "Array One =\n"; var_dump($arrInt);
	echo "Array Two = \n"; var_dump($arrIntTwo);
	echo "Array Intersection =\n"; var_dump($arrIntersectionInt);
	echo "Array Difference One =\n"; var_dump($arrDiffInt);
	echo "Array Difference Two =\n"; var_dump($arrDiffIntTwo);
	
	$arrMixInt = [];
	$arrMixInt = array_merge($arrIntersectionInt, $arrDiffInt, $arrDiffIntTwo);
	echo "Array Mix =\n"; var_dump($arrMixInt);

}

function ex01_float(): void{
	$arrFloat = array(15.4, 1.3, 2.4, 3.4, 4.67, 3.2, 6.5, 7.0, 8.2, 9.19 ,10.14,21.00);
	$arrFloatTwo = array(1.3, 2.4, 3.1, 4.4, 5.2, 6.5, 7.0, 8.1, 9.10 ,10.14);

	$arrIntersectionFloat = [];
	$arrIntersectionFloat = array_intersect($arrFloat, $arrFloatTwo);
	
	$arrDiffFloat = [];
	$arrDiffFloat = array_diff($arrFloat, $arrFloatTwo);
	$arrDiffFloatTwo = array_diff($arrFloatTwo, $arrFloat);
	
	echo "Array One =\n"; var_dump($arrFloat);
	echo "Array Two = \n"; var_dump($arrFloat);
	echo "Array Intersection =\n"; var_dump($arrIntersectionFloat);
	echo "Array Difference =\n"; var_dump($arrDiffFloat);
	
	$arrMixFloat = [];
	$arrMixFloat = array_merge($arrIntersectionFloat, $arrDiffFloat,$arrDiffFloatTwo );
	echo "Array Mix =\n"; var_dump($arrMixFloat);

}

function myValueCompare($valueOne, $valueTwo): bool{
	if($valueOne == $valueTwo){
		return True;
	}else{
		return False;
	}

}

function ex01_mix(): void{
	$arrMix = array(15.4, 1.3, 2.4, 3.0, 4.67, 3.2, 6.5, 7.0, 8.2, 9.19 ,10.14,21.00);
	$arrMixTwo = array(1.3, 2.4, 3, 4.4, 5.2, 6.5, 7.0, 8.1, 9.10 ,10.14);

	$arrIntersectionMix = [];
	$arrIntersectionMix = array_uintersect($arrMix, $arrMixTwo,"myValueCompare");
	
	$arrDiffMix = [];
	$arrDiffMix = array_diff($arrMix, $arrMixTwo);
	$arrDiffMixTwo = array_diff($arrMixTwo, $arrMix);
	
	echo "Array One =\n"; var_dump($arrMix);
	echo "Array Two = \n"; var_dump($arrMix);
	echo "Array Intersection =\n"; var_dump($arrIntersectionMix);
	echo "Array Difference =\n"; var_dump($arrDiffMix);
	
	$arrMixMix = [];
	$arrMixMix = array_merge($arrIntersectionMix, $arrDiffMix,$arrDiffMixTwo );
	echo "Array Mix =\n"; var_dump($arrMixMix);

}

function ex02_list($gradesArray){
	foreach(array_keys($gradesArray) as $key){
		echo "Pupil Name: ", $key, "\n";
		printf("Pupils Grades: ");
		
		if(is_array($gradesArray[$key])==False){
			printf("I will never let you down... but I am a liar..\n");
			echo "Wrong Input in ex02_commpute";
			return;
		}
		
		
		for($i = 0; $i<count($gradesArray[$key]); $i++){
			printf("   %f   ",$gradesArray[$key][$i]);
		}
		printf("\n");
	}
}


function ex02_compute($gradesArray){
	
	$sumClassGrades = 0.0;
	$sumClassPupils = 0;
	$classMedian = 0.0;
	
	foreach(array_keys($gradesArray) as $key){
		
		$sumClassPupils ++;
		$pupilsMedian = 0.0;
		$pupilsGradesAmount = 0;
		$pupilsSumGrades = 0;
		
		if(is_array($gradesArray[$key])==False){
			printf("I will never let you down... but I am a liar..\n");
			echo "Wrong Input in ex02_commpute";
			return;
		}
		
		for($i = 0; $i<count($gradesArray[$key]); $i++){
			if(is_numeric($gradesArray[$key][$i])){
				$pupilsGradesAmount ++;
				$pupilsSumGrades = $pupilsSumGrades + $gradesArray[$key][$i];
			}else{
				printf("No Number Value Found in key = %s with index = %d and value %s\n", $key, $i,$gradesArray[$key][$i]);
			}
		}
		if($pupilsGradesAmount > 0){
			$pupilsMedian = $pupilsSumGrades / $pupilsGradesAmount;
		}else{
			printf("ERROR - ex02_compute - Either the Teacher has forgotten to add the grades or the pupil was never a pupil... or... Maybe did you put  a negative amount of grades? How can that happen...");
		}
		printf("The media for the pupil %s is %f\n", $key, $pupilsMedian);
		
		$sumClassGrades = $sumClassGrades + $pupilsMedian;
		
	}
	
	if($sumClassPupils >0){
		$classMedian = $sumClassGrades / $sumClassPupils;
		printf("Class median is = %f      for %d pupils.\n", $classMedian, $sumClassPupils);	
	}else{
		printf("Are you trying to break me? Come on!! Give me a correct Input!");
	}
	
	
}

echo "\n\nEx01 Integers --------- \n";
ex01_int();

echo "\n\nEx01 Floats --------- \n"; 
ex01_float();

echo "\n\nEx01 Mix --------- \n"; 
ex01_mix();


echo "\n\nEx02 --------- \n";
/*REMEMBER - NAME - Multidimensional Associative Arrays*/
$gradesPupils = array(
	"TheDude"=> array(5,9,3,4,4.3),
	"TheDudeInTheMiddle"=> array(8,7.5,7,3.9,6.3),
	"TheSilentDude"=> array(10,7.5,7,3.9,6.3),
	"TheSorryIAmLateDude"=> array(10,7.5,5,3.9,4.3)
	);

ex02_list($gradesPupils);

echo "\n\nEx02 Part 2--------- \n";
ex02_compute($gradesPupils);


/*From here to end just playing around.*/
echo "\n\nEx02 Test --------- \n";
$gradesPupils = array(
	"TheDude"=> array(5,9,3,4,4.3,0),
	"TheDudeInTheMiddle"=> array(8,7.5,7,3.9,6.3),
	"TheSilentDude"=> array(10,7.5,7,3.9,6.3,8.9),
	"TheSorryIAmLateDude"=> array(10,7.5,3.9,4.3)
	);
	
ex02_list($gradesPupils);

echo "\n\nEx02 Part 2--------- \n";
ex02_compute($gradesPupils);



echo "\n\nEx02 Test 2  --------- \n";
$gradesPupils = array(
	"TheDude"=> 9,
	"TheDudeInTheMiddle"=> array(8,7.5,7,3.9,6.3),
	"TheSilentDude"=> array(10,7.5,7,3.9,6.3,8.9),
	"TheSorryIAmLateDude"=> array(10,7.5,3.9,4.3)
	);
	
ex02_list($gradesPupils);

echo "\n\nEx02 Part 2--------- \n";
ex02_compute($gradesPupils);

echo "\n\nEx02 Test 3  --------- \n";
$gradesPupils = array(
	"TheDude"=> array(5,"9",3,4,4.3,0),
	"TheDudeInTheMiddle"=> array(8,"EyLookIFoundACoin",7,3.9,6.3),
	"TheSilentDude"=> array(10,7.5,7,3.9,"tarara", 'c',8.9),
	"TheSorryIAmLateDude"=> array(10,7.5,3.9,4.3)
	);
	
ex02_list($gradesPupils);

echo "\n\nEx02 Part 2--------- \n";
ex02_compute($gradesPupils);

?>
