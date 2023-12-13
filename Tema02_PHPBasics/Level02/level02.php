<?php


function ex01(float $timeMinutes): float{
	$costEuros = 0.0;
	if($timeMinutes <=3){
		$costEuros = 0.10; /*10 Centims*/
	}else{
		$costEuros = 0.10 + 0.05*ceil(($timeMinutes-3));
	}
	return $costEuros;
}

function ex02(int $amount,string $item): float{
	
	$totalCostItems = 0.0;
	
	switch($item){
		case "xocolata":
		case "Xocolata":
		case "xocolates":
		case "Xocolates":
			$totalCostItems = $amount * 1.00;
			break;
		case "xicles":
		case "Xicles":
		case "xicle":
		case "Xicle":
			$totalCostItems = $amount * 0.50;
			break;
		case "caramels":
		case "Caramels":
		case "caramel":
		case "Caramel":
			$totalCostItems = $amount * 1.50;
			break;
		default:
			printf("ERROR - ex02 - Item not valid!");
			return 0;
			break;
			
	}
	return $totalCostItems;

}

echo "ex01 Nivell 02\n";

printf("Cost for 2 Minutes In Euros = %f\n", ex01(2.0));
printf("Cost for 3 Minutes In Euros = %f\n", ex01(3.0));
printf("Cost for 3.5 Minutes In Euros = %f\n", ex01(3.5));
printf("Cost for 3.9 Minutes In Euros = %f\n", ex01(3.9));
printf("Cost for 4 Minutes In Euros = %f\n", ex01(4.0));
printf("Cost for 5 Minutes In Euros = %f\n", ex01(5.0));
printf("Cost for 7 Minutes In Euros = %f\n", ex01(7.0));

echo "ex02 Nivell 02\n";
$total = ex02(2, "xocolates") + ex02(1, "xicles") + ex02(1, "caramels");
printf("Total 2xocos + 1 xicles + 1 caramels = %f\n", $total);
$total = ex02(2, "pipas")
?>
