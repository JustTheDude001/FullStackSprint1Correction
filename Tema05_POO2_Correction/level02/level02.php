<?php 
function ex01(){
	
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


echo "------------ Ex 01 using Abstracts -------------\n";
ex01();

?>
