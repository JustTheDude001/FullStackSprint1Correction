<?php


function ex01_correction_MVP(){
	
	abstract class animal{
		public string $animalSound;
		
		public function makeSound(){
			echo $this->animalSound;
		}

		
	}
	
	
	class Cat extends animal{
		public string $animalSound = "marrameu \n";		
	}
	
	class Dog extends animal{	
		public string $animalSound = "Bup bup!\n";			
	}

	
	$dogOne = new Dog();
	$catOne = new Cat();
	
	$dogOne->makeSound();
	$catOne->makeSound();
	
}

ex01_correction_MVP()


?>
