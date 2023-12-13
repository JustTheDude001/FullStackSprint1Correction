<?php
class NumberChecker  {


	public function __construct(private int $number){}

	public function isEven(): bool {
		return $this->number%2 == 0;
	}
	public function isPositive(): bool {
		return $this->number > 0;
	}

}

//Test
/*
$evenNum = new NumberChecker(1);
$fourNumNeg = new NumberChecker(-4);
echo var_dump($evenNum->isEven());
echo var_dump($evenNum->isPositive());
echo var_dump($fourNumNeg->isEven());
echo var_dump($fourNumNeg->isPositive());
* */
?>
