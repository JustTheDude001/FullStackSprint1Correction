<?php

	
	include "AuxFiles/numberChecker.php";
	
	use PHPUnit\Framework\TestCase;

	
	final Class testEx01 extends TestCase
	{
		//Tests will go here
		
		// Define object:
		//Not needed - No Attributes
		
		//Define Numbers to check:
		/*
		function testAll(){
			
			//Define all values to do the test:
			$negative_01 = new NumberChecker(-100);
			$negative_02 = new NumberChecker(-4.5);
			$negative_03 = new NumberChecker(-123);
			
			$zero_01 = new NumberChecker(0);
			$zero_02 = new NumberChecker(0.0);
			
			$positive_01 = new NumberChecker(123);
			$positive_02 = new NumberChecker(4.45);
			
			$odd_01 = new NumberChecker(3);
			$odd_02 = new NumberChecker(-5.0);
			
			$even_01 = new NumberChecker(4);
			$even_02 = new NumberChecker(8.0);
			
			$float_01 = new NumberChecker(8.3);
			
			
			//Check output
			$this->assertSame(True, $even_01->isEven());
			$this->assertSame(True, $even_02->isEven());
			$this->assertSame(False, $odd_01->isEven());
			$this->assertSame(False, $odd_02->isEven());

			$this->assertSame(True,$zero_01->isEven());
			
			$this->assertSame(True,$positive_01->isPositive());
			$this->assertSame(True,$positive_02->isPositive());
			
			$this->assertSame(False,$negative_01->isPositive());
			$this->assertSame(False,$negative_02->isPositive());
			
			//To check failures
			$this->assertSame(True,$zero_01->isPositive());
			//Zero is not positive, neither negative, but not positive as well. What the hell is it then? Zero is a hero by itself.
			$this->assertSame(False,$zero_01->isPositive());
		}
		
		*/
		/* DATA PROVIDER
		 * REMEMEMBER ADD @dataProvider providerName before the function that is provided with its data
		 * */
		 
		 
		/**
		 * @dataProvider providerEven
		 */
		function testIsEven($boolVal, $number){
			$numberObj = new NumberChecker($number);
			$this->assertSame($boolVal, $numberObj->isEven());
		}
		
		
		/**
		 * @dataProvider providerPositive
		 */
		
		function testIsPositive($boolVal, $number){
			$numberObj = new NumberChecker($number);
			$this->assertSame($boolVal, $numberObj->isPositive());
		}
		
		
		
		public function providerPositive()
		{
			return array(
			  array(True, 1),
			  array(True, 3.0),
			  array(True, 0.1),
			  array(False, 0),
			  array(False, -1),
			  array(False, -5.3),
			  array(True, 1467123),
			  array(False, -1231298731.9),
			  array(False, "abdcd")
			);
			//Next Line seems unused/avoided by phpunit
			echo "Even Test Exepcted Output: 8 Assertions, 0 Failures , 1 Error\n";
		}
		
		
		public function providerEven()
		{
			return array(
			  array(False, 1),
			  array(False, 3.0),
			  array(True, 4.0),
			  array(False, 0.1),
			  array(True, 0),
			  array(False, -1),
			  array(True, -8),
			  array(False, 1467123),
			  array(False, -1231298731.9),
			  array(False, "abdcd")
			);
			//Next Line seems unused/avoided by phpunit
			echo "Even Test Exepcted Output: 9 Assertions, 0 Failures , 1 Error\n";
		}
		
		public function testEcho()
		{
			
			echo "\nEven Test Exepcted Output: 8 Assertions, 0 Failures , 1 Error\n";
			echo "Even Test Exepcted Output: 9 Assertions, 0 Failures , 1 Error\n";
			echo "TOTAL :\n";
			echo "Even Test Exepcted Output: 17 Assertions, 0 Failures , 2 Error\n";
		}
	}
	
	/*ASK THEACHER - 
	 * How to print with echo / printf after the results of the test are given;
	 * Note - Now is printed at the beggining of the result
	 * */
?>
