<?php

	
	include "checkGrade.php";
	
	use PHPUnit\Framework\TestCase;

	
	final Class testCheckGrade extends TestCase
	{
		function test_CheckGrade(){
			$this->assertSame("Primera Divisió", checkGrade(100));
			$this->assertSame("Primera Divisió", checkGrade(70));
			$this->assertSame("Primera Divisió", checkGrade(60));
			
			$this->assertSame("Segona Divisió", checkGrade(59));
			$this->assertSame("Segona Divisió", checkGrade(50));
			$this->assertSame("Segona Divisió", checkGrade(45));
			
			$this->assertSame("Tercera Divisió", checkGrade(37));
			$this->assertSame("Tercera Divisió", checkGrade(33));
			
			$this->assertSame("Suspes", checkGrade(20));
			$this->assertSame("Suspes", checkGrade(10));
			$this->assertSame("Suspes", checkGrade(0));
			$this->assertSame("Suspes", checkGrade(-10));
			$this->assertSame("Suspes", checkGrade(-100));
		}
		
	}
	
	
	
	
?>
