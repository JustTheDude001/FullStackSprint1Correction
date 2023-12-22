<?php

function sedasErastotenes($maxValue){
	$isPrimeArray[]= True;
	/*Initialize Values*/
	for($i = 0; $i<=$maxValue; $i++){
		$isPrimeArray[]=True;
	}
	//printf("Array Length = %d\n",count($isPrimeArray));
	
	$rootMaxValue = sqrt($maxValue);
	
	for($i = 2; $i<=$rootMaxValue; $i++){
		
		if($isPrimeArray[$i]==True){
		
			for($a = $i+1; $a<=$maxValue; $a++){
				if($a%$i==0 ){
					$isPrimeArray[$a]=False;
				}
			}
		}
	}
	
	/*
	for($i = 0; $i<$maxValue; $i++){
		if($isPrimeArray[$i]== True){
			printf("%d    ",$i);
		}
	}*/
	echo "The number ", $maxValue, "is prime? ", var_dump($isPrimeArray[$maxValue]);
	
	
	
}
sedasErastotenes(71);


?>
