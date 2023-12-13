<?php
	
	/* USING PHPUnit 9.6.7*/
	
	include "AuxFiles/numberChecker.php";
	
	use PHPUnit\Framework\TestCase;

	
	final Class testEx01 extends TestCase
	{
		//Tests will go here
		
		// Define object:
		//Not needed - No Attributes
		
		//Define Numbers to check:
		/*
		function testFirst(){
			
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
			
			
			
			$float_01 = new NumberChecker(8.3);
			
			$even_01 = new NumberChecker(4);
			$even_02 = new NumberChecker(8.0);
			//Check output
			$this->assertSame(True, $even_01->isEven());
			$this->assertSame(True, $even_02->isEven());
			$this->assertSame(False, $odd_01->isEven());
			$this->assertSame(False, $odd_02->isEven());
			
			
			$even_01 = new NumberChecker(0.5);
			$even_02 = new NumberChecker(1.5);
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
		
		
		public function testOrderEven(){
			
			//Even = True
			$numberObj = new NumberChecker(0);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(-2);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(2);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(-4);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(4);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(-8.0);
			$this->assertSame(True, $numberObj->isEven());
			$numberObj = new NumberChecker(8.0);
			$this->assertSame(True, $numberObj->isEven());
			
			//Even False
			$numberObj = new NumberChecker(1);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(-1);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(1.5);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(-1.5);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(2.5);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(-2.5);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(-3.5);
			$this->assertSame(False, $numberObj->isEven());
			$numberObj = new NumberChecker(9.0);
			$this->assertSame(False, $numberObj->isEven());
			
		}
		
		public function testOrderPositive(){
			
			//Positive False
			$numberObj = new NumberChecker(0);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-2);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-0.1);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-3);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-4.5);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-1298371231);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-123123.321);
			$this->assertSame(False, $numberObj->isPositive());
			$numberObj = new NumberChecker(-8.0);
			$this->assertSame(False, $numberObj->isPositive());
			
			//Even True
			$numberObj = new NumberChecker(1);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(0.5);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(1.5);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(2.53);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(2.5);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(42.5);
			$this->assertSame(True, $numberObj->isPositive());
			$numberObj = new NumberChecker(12329182831.3);
			$this->assertSame(True, $numberObj->isPositive());
			
		}
		
		/* ASK TEACHER 
		 *WHY THE FOLLOWING BLOCK DOES NOT WORK 
		 * 		How to use loops with phpunit - sadly it gives an exception that breaks the loop
		 * 		It is possible to choose between exception or false positive
		 *Cannot define type of variable? (int $index raises ERROR?)
		 */
		
		/*
		 * COMMENTED BECAUSE OF COHERENCE RESULT
		
		public function testIsEven(){
			
			$numberTests = 10;
			$index = 0;
			//Even == True
			for($index = 0; $index < $numberTests; $index++){
				$number = $index*2;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(True, $evenNumber->isEven());
			}
			
			//Even == True Negative 
			for($index = 0; $index > -$numberTests; $index--){
				$number = $index*2;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(True, $evenNumber->isEven());
			}
			
			echo "Test 1 - Expected Results = ", $numberTests*2, "assertions\n";
			
			//Even == False
			for($index = 0; $index < $numberTests; $index++){
				$number = $index*2+1;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(False, $evenNumber->isEven());
			}
			
			//Even == False Negative 
			for($index = 0; $index > -$numberTests; $index--){
				$number = $index*2+1;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(False, $evenNumber->isEven());
			}
			
			echo "Test 2 - Expected Results = ", $numberTests*2, "assertions\n";
			
			
			
			
			
			//Even == False Decimal
			for($index = 0; $index < $numberTests; $index++){
				$number = $index*1+0.5;
				$evenNumber = new NumberChecker($number);
				//WARNING
				//IF YOU CATCH ALL EXCEPTIONS - phpUnit Give FALSE Assertions!!! Print The Errors!
				try {
					$this->assertSame(False, $evenNumber->isEven());
				}catch (PHPUnit_Framework_AssertionFailedError $e) {
					printf("Failure in Even == False Decimal index = %d \n", $index);
				}catch (\Throwable $th) {
					# code...
					printf("Failure in Even == False Decimal index = %d \n", $index);
				}
				
			}
			//Fails here because of 0.5, 2.5 etc
			

			//Even == False Decimal 
			for($index = 0; $index > -$numberTests; $index--){
				$number = $index*1-0.5;
				$evenNumber = new NumberChecker($number);
				
				//WARNING
				//IF YOU CATCH ALL EXCEPTIONS - phpUnit Give FALSE Assertions!!! Print The Errors!
				
				
				try {
					$this->assertSame(False, $evenNumber->isEven());
				}catch (PHPUnit_Framework_AssertionFailedError $e) {
					printf("Failure in Even == False Decimal index = %d \n", $index);
				}catch (\Throwable $th) {
					# code...
					printf("Failure in Even == False Decimal index = %d \n", $index);
				}
			}
			
			echo "Test 3 - Expected Results = ", $numberTests*2, "failures\n";
			
			
			//Even == True Decimal
			for($index = 0; $index < $numberTests; $index++){
				$number = $index*2+1.0;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(False, $evenNumber->isEven());
			}
			

			//Even == True Decimal 
			for($index = 0; $index > -$numberTests; $index--){
				$number = $index*2-1.0;
				$evenNumber = new NumberChecker($number);
				$this->assertSame(False, $evenNumber->isEven());
			}
			
			echo "Test 3 - Expected Results = ", $numberTests*2, "failures\n";
			
			
			//TOTAL RESULTS:
			echo "TOTAL RESULTS:\n";
			echo "Number of test = ", $numberTests * 10 * 6, " \n";
			echo "Expected Results = ", $numberTests*2, "assertions\n", $numberTests*2*2, "failures\n";
			//60
			// 20 - 40 
			
		}
		*/
		
		/*
		 * String values will fail for sure, not checked - And other not numeric values
		 */
		
		/* COMMENTED BECAUSE OF COHERENT RESULT
		public function testIsPositive(){
		
			$numberTests = 10;
			$index = 0;
			//Positive == True (Positive) 
			for($index = 0; $index < $numberTests; $index++){
				
				$number = $index*0.5;
				$evenNumber = new NumberChecker($number);
				
				try {
					$this->assertSame(True, $evenNumber->isPositive());
				}catch (PHPUnit_Framework_AssertionFailedError $e) {
					printf("Positive == True (Positive)  index = %d \n", $index);
				}catch (\Throwable $th) {
					# code...
					printf("Positive == True (Positive)  index = %d \n", $index);
				}
			}
			
			//Positive == False (Negative) 
			for($index = 0; $index > -$numberTests; $index--){
				
				$number = $index*0.5;
				$evenNumber = new NumberChecker($number);
				
				try {
					$this->assertSame(False, $evenNumber->isPositive());
				}catch (PHPUnit_Framework_AssertionFailedError $e) {
					printf("Positive == False (Negative)  index = %d \n", $index);
				}catch (\Throwable $th) {
					# code...
					printf("Positive == False (Negative)  index = %d \n", $index);
				}
			}
			
			echo "Test 1 - Expected Results = ", $numberTests*2 - 2, "assertions\n", 2, "failures\n";
		
		}
		* */
	}
	
?>
