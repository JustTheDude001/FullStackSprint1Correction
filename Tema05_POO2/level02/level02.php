<?php 


function ex01_interfaces(){
	
	interface shapeInterface{
		
		public function __construct(float $width, float $heigth);
		public function areaCompute();
	
	}
	
	class TriangleInt implements shapeInterface
	{
		public float $width = 0.0;
		public float $heigth = 0.0;
		
		public function __construct(float $width, float $heigth){
			$this->width = $width;
			$this->heigth = $heigth;
		}
		public function areaCompute(): float{
			return $this->width * $this->heigth / 2;
		}
		
	}
	class RectangleInt implements shapeInterface
	{
		public float $width = 0.0;
		public float $heigth = 0.0;
		
		public function __construct(float $width, float $heigth){
			$this->width = $width;
			$this->heigth = $heigth;
		}
		public function areaCompute(): float{
			return $this->width * $this->heigth;
		}
		
	}
	
	$triangle_01 = new TriangleInt(2.5,4.0);
	echo "Area of triangle: ", var_dump($triangle_01->areaCompute());
	
	$triangle_02 = new TriangleInt(2.5,3);
	echo "Area of triangle: ", var_dump($triangle_02->areaCompute());
	
	
	$rectangle_01 = new RectangleInt(2.5,4.0);
	echo "Area of rectangle: ", var_dump($rectangle_01->areaCompute());
	
	$rectangle_02 = new RectangleInt(2.5,3);
	echo "Area of rectangle: ", var_dump($rectangle_02->areaCompute());
	
}

function ex01_abstracts(){
	
	abstract class shapeAbstract{
		
		public float $width = 0.0;
		public float $heigth = 0.0;
		
		public function __construct(float $width, float $heigth){
			$this->width = $width;
			$this->heigth = $heigth;
		}
		abstract public function areaCompute();
	
	}
	
	class TriangleAbs extends shapeAbstract
	{
		
		public function areaCompute(): float{
			return $this->width * $this->heigth / 2;
		}
		
	}
	class RectangleAbs extends shapeAbstract
	{

		public function areaCompute(): float{
			return $this->width * $this->heigth;
		}
		
	}
	
	$triangle_01 = new TriangleAbs(2.5,4.0);
	echo "Area of triangle: ", var_dump($triangle_01->areaCompute());
	
	$triangle_02 = new TriangleAbs(2.5,3);
	echo "Area of triangle: ", var_dump($triangle_02->areaCompute());
	
	
	$rectangle_01 = new RectangleAbs(2.5,4.0);
	echo "Area of rectangle: ", var_dump($rectangle_01->areaCompute());
	
	$rectangle_02 = new RectangleAbs(2.5,3);
	echo "Area of rectangle: ", var_dump($rectangle_02->areaCompute());
	
}

echo "------------ Ex 01 using Interfaces -------------\n";
ex01_interfaces();
echo "------------ Ex 01 using Abstracts -------------\n";
ex01_abstracts();

?>
