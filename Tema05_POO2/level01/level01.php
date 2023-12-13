<?php


function ex01_abstract(){
	
	abstract class animal{
		public string $animalName;
		public string $animalSound;
		
		
		abstract public function __construct(string $name, string $sound);
		abstract public function makeSound();
		abstract public function setSound(string $sound);
		abstract public function setName(string $name);
		
		/*
		public function __construct(string $name, string $sound){}
		public function makeSound(){}
		public function setSound(string $sound){}
		public function setName(string $name){}
		* */
		
	}
	
	
	class cat extends animal{
		
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}
				
	}
	
	class dog extends animal{
		
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}
				
	}
	
	
	
	$catNormal = new cat("NormalCat","Marrameu!!!");
	$catNormal->printName(); echo " : "; $catNormal->makeSound();
	 
	
	$cat = new cat("GarfieldCat","IWantLasagna!!!");
	$cat->printName(); echo" : "; $cat->makeSound();
	
	$dogNormal = new dog("NormalDog","Grrrrr!!!");
	$dogNormal->printName(); echo " : "; $dogNormal->makeSound();
	 
	
	$dog = new dog("Cancervero","The doors of hell are open for those who are willing to die!!!");
	$dog->printName(); echo" : "; $dog->makeSound();


}


function ex01_abstract_v2(){
	
	abstract class animalTwo{
		public string $animalName;
		public string $animalSound;
		
		/*
		abstract public function __construct(string $name, string $sound);
		abstract public function makeSound();
		abstract public function setSound(string $sound);
		abstract public function setName(string $name);
		*/
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}
		
	}
	
	
	class catTwo extends animalTwo{		
	}
	
	class dogTwo extends animalTwo{			
	}
	
	
	
	$catNormal = new catTwo("NormalCat","Marrameu!!!");
	$catNormal->printName(); echo " : "; $catNormal->makeSound();
	 
	
	$cat = new catTwo("GarfieldCat","IWantLasagna!!!");
	$cat->printName(); echo" : "; $cat->makeSound();
	
	$dogNormal = new dogTwo("NormalDog","Grrrrr!!!");
	$dogNormal->printName(); echo " : "; $dogNormal->makeSound();
	 
	
	$dog = new dogTwo("Cancervero","The doors of hell are open for those who are willing to die!!!");
	$dog->printName(); echo" : "; $dog->makeSound();

}

function ex01_abstract_Mix(){
	
	abstract class animalMix{
		public string $animalName;
		public string $animalSound;
		
		/*
		abstract public function __construct(string $name, string $sound);
		abstract public function makeSound();
		abstract public function setSound(string $sound);
		abstract public function setName(string $name);
		*/
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}
		/*Abstract with different behaviour for each animal - Selected for difference between dogs and cats*/
		abstract public function shittingProcess();
		
	}
	
	
	class catMix extends animalMix{	
		public function shittingProcess(){
			echo "1. Look for somewhere comfortable.\n";
			echo "2. Dig a hole.\n";
			echo "3. Relax and aim to the hole.\n";
			echo "4. Cover the excrement with sand or whatever you have around\n";
		}
	}
	
	class dogMix extends animalMix{
		
		public function shittingProcess($someoneNearBool = False){
			echo "1. Look for somewhere with other animal smell.\n";
			echo "2. Just do it.\n";
			if($someoneNearBool == False){
				echo "3. Look for somebody to come.\n";
				echo "4. Nobody comes, therefore leave the place.\n";
			}else{
				echo "3. Throw the sand and (if possible) what you just released to the nearest animal being.\n";
				echo "4. Leave as happy as possible! Thinking... what a beautifull life\n";
				
			}
		}		
	}
	
	
	
	$catNormal = new catMix("NormalCat","Marrameu!!!");
	$catNormal->printName(); echo " : "; $catNormal->makeSound();
	 
	
	$cat = new catMix("GarfieldCat","IWantLasagna!!!");
	$cat->printName(); echo" : "; $cat->makeSound();
	
	$dogNormal = new dogMix("NormalDog","Grrrrr!!!");
	$dogNormal->printName(); echo " : "; $dogNormal->makeSound();
	 
	
	$dog = new dogMix("Cancervero","The doors of hell are open for those who are willing to die!!!");
	$dog->printName(); echo" : "; $dog->makeSound();
	
	echo "Testing Digestive System...\n";
	echo "\nNormalCat:\n";
	$catNormal->shittingProcess();
	echo "\nCat:\n";
	$cat->shittingProcess();
	echo "\nDog Empty:\n";
	$dog->shittingProcess();
	echo "\nDog False:\n";
	$dog->shittingProcess(False);
	echo "\nDogNormal Empty:\n";
	$dogNormal->shittingProcess();
	echo "\nDog Normal True:\n";
	$dogNormal->shittingProcess(True);

}

function ex01_UsingAbstract(){
	
	echo "---------- Ex01 Abstact Version 1 ----------\n";
	ex01_abstract();

	echo "---------- Ex01 Abstact Version 2 ----------\n";
	ex01_abstract_v2();

	echo "---------- Ex01 Abstact Version Mix ----------\n";
	ex01_abstract_mix();

	/* ASK TEACHER - 
	 * 1. How to define an asbtract function inside another function in order to just "see" it inside this function and be able to use the SAME abstract function Name in another Function.
	 * 2. The same as question number 1 but with classes.
	 */
}


function ex01_interface(){
	
	interface AnimalInterface{
		
		/* REMEMBER -  It is NOT possible to add public variables or properties into an interface*/
		/*
		public string $name;
		public string $sound;
		*/
		public function __construct(string $name, string $sound);
		public function makeSound();
		public function setSound(string $sound);
		public function setName(string $name);
		public function shittingProcess();
	}
	
	class catInt implements AnimalInterface{
		/* ASK THEACER - WHY it is not persuatory to add the properties definition below. It works without this next 2 lines.*/
		public string $name;
		public string $sound;
		
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}
		
		public function shittingProcess(){
			echo "1. Look for somewhere comfortable.\n";
			echo "2. Dig a hole.\n";
			echo "3. Relax and aim to the hole.\n";
			echo "4. Cover the excrement with sand or whatever you have around\n";
		}				
	}
	
	class dogInt implements AnimalInterface{
		
		/* ASK THEACER - WHY it is not persuatory to add the properties definition below. It works without this next 2 lines.*/
		public string $name;
		public string $sound;
		
		public function __construct(string $name, string $sound){
			$this->animalName = $name;
			$this->animalSound = $sound;
		}
		public function printName(){
			printf("%s", $this->animalName);
		}
		public function makeSound(){
			printf("%s\n", $this->animalSound);
		}
		public function setSound(string $sound){
			$this->animalSound = $sound;
		}
		public function setName(string $name){
			$this->animalName = $name;
		}

		
		public function shittingProcess($someoneNearBool = False){
			echo "1. Look for somewhere with other animal smell.\n";
			echo "2. Just do it.\n";
			if($someoneNearBool == False){
				echo "3. Look for somebody to come.\n";
				echo "4. Nobody comes, therefore leave the place.\n";
			}else{
				echo "3. Throw the sand and (if possible) what you just released to the nearest animal being.\n";
				echo "4. Leave as happy as possible! Thinking... what a beautifull life\n";	
			}
		}
				
	}
	
	$catNormal = new catInt("NormalCat","Marrameu!!!");
	$catNormal->printName(); echo " : "; $catNormal->makeSound();
	 
	
	$cat = new catInt("GarfieldCat","IWantLasagna!!!");
	$cat->printName(); echo" : "; $cat->makeSound();
	
	$dogNormal = new dogInt("NormalDog","Grrrrr!!!");
	$dogNormal->printName(); echo " : "; $dogNormal->makeSound();
	 
	
	$dog = new dogInt("Cancervero","The doors of hell are open for those who are willing to die!!!");
	$dog->printName(); echo" : "; $dog->makeSound();
	
	
	echo "Testing Digestive System...\n";
	echo "\nNormalCat:\n";
	$catNormal->shittingProcess();
	echo "\nCat:\n";
	$cat->shittingProcess();
	echo "\nDog Empty:\n";
	$dog->shittingProcess();
	echo "\nDog False:\n";
	$dog->shittingProcess(False);
	echo "\nDogNormal Empty:\n";
	$dogNormal->shittingProcess();
	echo "\nDog Normal True:\n";
	$dogNormal->shittingProcess(True);
	
	
	
	
}

function ex01_UsingInterface(){
	
	echo "---------- Ex01 Interface Version 1 ----------\n";
	ex01_interface();
	
	/*
	echo "---------- Ex01 Abstact Version 2 ----------\n";
	ex01_abstract_v2();

	echo "---------- Ex01 Abstact Version Mix ----------\n";
	ex01_abstract_mix();
	*/
}



ex01_UsingAbstract();
ex01_UsingInterface();

?>
