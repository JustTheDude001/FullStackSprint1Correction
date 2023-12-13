<?php


define("wageForTaxes", 6000);

function ex01(){
	
	class Employee
	{
		public float $sou = 0.0;
		public string $nom = "None";
		public bool $taxesBool = False;
		
		public function __construct(string $name, float $wage){
			$this->sou = $wage;
			$this->nom = $name;
			
			if($this->sou > wageForTaxes){
				$this->taxesBool = True;
			}
			
		}
		
		public function print(){
			
			printf("Name: %s\n",$this->nom);
			if($this->taxesBool == True){
				printf("YOU need to pay taxes! If you DO NOT do so the government will find you, chain you and slave you! Take it as a little price for what you call 'freedom'...\n");
			}else{
				printf("You are 'free' to do not paying taxes.\n");
			}
		}
		
		
		
	}
	
	$emp01 = new Employee("TheWorkingDude",2000.0);
	$emp01->print();
	
	$emp02 = new Employee("TheSmartWorkingDude",4000.0);
	$emp02->print();
	
	$emp03 = new Employee("TheLuckyWorkingDude",7000.0);
	$emp03->print();
	
	

}

function ex02(){
	class Shape
	{
		
		public float $width = 0.0;
		public float $heigth = 0.0;
		
		public function __construct(float $width, float $heigth){
			$this->width = $width;
			$this->heigth = $heigth;
			
		}
	}
	class Triangle extends Shape
	{
		public float $area = 0.0;
		public function area(){
			$this->area = ($this->width * $this->heigth)/2;
			return $this->area;
		}
	}
	
	class Rectangle extends Shape
	{
		public float $area = 0.0;
		public function area(){
			$this->area = ($this->width * $this->heigth);
			return $this->area;
		}
	}
	
	
	$triangle_01 = new Triangle(2.5,4.0);
	echo "Area of triangle: ", var_dump($triangle_01->area());
	
	$triangle_02 = new Triangle(2.5,3);
	echo "Area of triangle: ", var_dump($triangle_02->area());
	
	
	$rectangle_01 = new Rectangle(2.5,4.0);
	echo "Area of rectangle: ", var_dump($rectangle_01->area());
	
	$rectangle_02 = new Rectangle(2.5,3);
	echo "Area of rectangle: ", var_dump($rectangle_02->area());
	
	/*Notes for the future
	 * Because area is a common property for both  classes it could be added into the common class Shape
	 */
	
}



echo "--------- Ex 01 -----------\n";
ex01();


echo "--------- Ex 02 -----------\n";
ex02();

?>
