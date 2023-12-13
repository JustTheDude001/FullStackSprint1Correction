<?php

define("NumberOfDices",5);
function ex01(){
	
	class PokerDice
	{
		private array $Faces = array("As","K","Q","J","7","8");
		private int $Face = 0;
		
		
		public function __construct(){
		}
		
		public function throw(){
			$indexFace = rand(0,5);
			$this->Face = $indexFace;
		}
		
		public function shapeName(){
			return $this->Faces[$this->Face];
		}
	}
	
	class Game extends PokerDice{
		
		/*public array $PokerDices = array(new PokerDice(),new PokerDice(),new PokerDice(),new PokerDice(),new PokerDice());*/
		/*ASK TEACHER - Easy way of making an array of objects*/
		
		/*Found this way:*/
		public array $PokerDices = array();
		public int $amountPlays = 0;
		
		public function __construct(){
			
			for($i=0;$i<NumberOfDices;$i++){
				$this->PokerDices[] = new PokerDice();
			}

		}
		
		public function play(){
			$this->amountPlays ++;
			for($i=0; $i<NumberOfDices;$i++){
				$this->PokerDices[$i]->throw();
			}
		}
		
		public function getPlay(){
			$arrayRes = [];
			for($i=0; $i<NumberOfDices;$i++){
				$arrayRes[] = $this->PokerDices[$i]->shapeName();
			}
			return $arrayRes;
		}
		
		
		public function getTotalThrows(){
			return $this->amountPlays*NumberOfDices;
		}
			
	}
	
	$dauOne = new PokerDice();
	$dauOne->throw();
	echo "Face last throw = ", var_dump($dauOne->shapeName());
	
	$dauOne->throw();
	echo "Face last throw = ", var_dump($dauOne->shapeName());
	
	$dauOne->throw();
	echo "Face last throw = ", var_dump($dauOne->shapeName());
	
	$gameOne = new Game();
	$gameOne->play();
	echo "Last Play = ", var_dump($gameOne->getPlay());
	echo "Total Throws = ", var_dump($gameOne->getTotalThrows());
	
	$gameOne->play();
	echo "Last Play = ", var_dump($gameOne->getPlay());
	echo "Total Throws = ", var_dump($gameOne->getTotalThrows());
	
}

echo "--------- Ex 01 --------------\n";
ex01();

/*Note - For the future - Game selecting the throws and checking the results for max points! */

?>
