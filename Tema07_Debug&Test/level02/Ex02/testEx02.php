<?php

	
	include "checkGrade.php";
	
	use PHPUnit\Framework\TestCase;

	
	final Class testEx02 extends TestCase
	{
		
		/* DATA PROVIDER
		 * REMEMEMBER ADD @dataProvider providerName before the function that is provided with its data
		 * */
		 
		 
		/**
		 * @dataProvider providerGrades
		 */
		function testCheckGrade($returnStr, $grade){
			$this->assertSame($returnStr, checkGrade($grade));
		}
		
		public function providerGrades()
		{
			return array(
			  array("Primera Divisió", 120),
			  array("Primera Divisió", 100),
			  array("Primera Divisió", 80),
			  array("Primera Divisió", 60),
			  array("Segona Divisió", 59.7),
			  array("Segona Divisió", 50),
			  array("Segona Divisió", 45.5),
			  array("Segona Divisió", 45),
			  array("Tercera Divisió", 44.6),
			  array("Tercera Divisió", 40),
			  array("Tercera Divisió", 33.4),
			  array("Tercera Divisió", 33),
			  array("Suspes", 32.7),
			  array("Suspes", 20.5),
			  array("Suspes", 0),
			  array("Suspes", -10)
			  //16
			);
			//Next Line seems unused/avoided by phpunit
			echo "Even Test Exepcted Output: 8 Assertions, 0 Failures , 1 Error\n";
		}
		
		/**
		 * @doesNotPerformAssertions
		 */
		//It is suposed to be a risky test - Just notes for the test with suposed results
		public function testEcho()
		{
			echo "\n testCheckGrade Test Exepcted Output: 16 Assertions, 0 Failures , 0 Error\n";
			echo "TOTAL :\n";
			echo "Even Test Exepcted Output: 16 Assertions, 0 Failures , 0 Error, 1 Risky\n";
		}
	}
	
	/*ASK THEACHER - 
	 * How to print with echo / printf after the results of the test are given;
	 * Note - Now is printed at the beggining of the result
	 * */
?>
