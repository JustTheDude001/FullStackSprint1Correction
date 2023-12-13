<?php 


function ex01_interfaces(){
	
	interface shapeInterface{
		
		/*public function __construct(float $width, float $heigth);*/
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
	
	class CircleInt implements shapeInterface
	{
		public float $radius = 0.0;
		
		
		public function __construct(float $radius, float $notUsed = 0.0){
			$this->radius = $radius;
		}
		public function areaCompute(): float{
			return $this->radius * $this->radius * pi();
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
	
	$circle_01 = new CircleInt(3);
	echo "Area of circle: ", var_dump($circle_01->areaCompute());
	
	$circle_02 = new CircleInt(6);
	echo "Area of circle Two: ", var_dump($circle_02->areaCompute());
	
	
	
	
}

function ex01_abstracts_v1(){
	
	abstract class shapeAbstract{
		
		public float $width = 0.0;
		public float $heigth = 0.0;
		public float $radius = 0.0;
		
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
	class CircleAbs extends shapeAbstract
	{
		
		public function __construct(float $radius){
			$this->radius = $radius;
		}
		
		public function areaCompute(): float{
			return $this->radius * $this->radius * pi();
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
	
	$circle_01 = new CircleAbs(3);
	echo "Area of circle: ", var_dump($circle_01->areaCompute());
	
	$circle_02 = new CircleAbs(6);
	echo "Area of circle Two: ", var_dump($circle_02->areaCompute());

	
}


function ex01_abstracts_v2(){
	
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

echo "------------ Ex 01 using Interfaces -------------\n";
ex01_interfaces();
echo "------------ Ex 01 using Abstracts And Overwriting Construct Method -------------\n";
ex01_abstracts_v1();

echo "------------ Ex 01 using Abstracts (My Choice - Default value in Abstract) -------------\n";
ex01_abstracts_v2();

?>
