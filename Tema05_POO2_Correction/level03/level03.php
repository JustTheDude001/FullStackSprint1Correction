<?php 


function ex01(){
	
	abstract class shapeAbstractv2{
		
		public float $width = 0.0;
		public float $heigth = 0.0;
		public float $radius = 0.0;
		
		public function __construct(float $width, float $heigth = 0.0){
			$this->width = $width;
			$this->heigth = $heigth;
		}
		abstract public function areaCompute();
	
	}
	
	class TriangleAbsv2 extends shapeAbstractv2
	{
		
		public function areaCompute(): float{
			return $this->width * $this->heigth / 2;
		}
		
	}
	class RectangleAbsv2 extends shapeAbstractv2
	{

		public function areaCompute(): float{
			return $this->width * $this->heigth;
		}
		
	}
	class CircleAbsv2 extends shapeAbstractv2
	{

		public function areaCompute(): float{
			return $this->width * $this->width * pi();
		}
		
	}
	
	$triangle_01 = new TriangleAbsv2(2.5,4.0);
	echo "Area of triangle: ", var_dump($triangle_01->areaCompute());
	
	$triangle_02 = new TriangleAbsv2(2.5,3);
	echo "Area of triangle: ", var_dump($triangle_02->areaCompute());
	
	
	$rectangle_01 = new RectangleAbsv2(2.5,4.0);
	echo "Area of rectangle: ", var_dump($rectangle_01->areaCompute());
	
	$rectangle_02 = new RectangleAbsv2(2.5,3);
	echo "Area of rectangle: ", var_dump($rectangle_02->areaCompute());
	
	$circle_01 = new CircleAbsv2(3);
	echo "Area of circle: ", var_dump($circle_01->areaCompute());
	
	$circle_02 = new CircleAbsv2(6);
	echo "Area of circle Two: ", var_dump($circle_02->areaCompute());

	
}



echo "------------ Ex 01 using Abstracts (My Choice - Default value in Abstract) -------------\n";
ex01();

?>
