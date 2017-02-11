<?php

class LuhnAlgorithmTest extends PHPUnit\Framework\TestCase
{

	protected $RomeNumbers;
	
	protected function setUp() {
		$this->RomeNumbers = new RomeNumbers\RomeNumbers;
	}


	public function testNumberSetterThrowsExceptionIfInt() {
		$this->expectException(InvalidArgumentException::class);	
		$this->RomeNumbers->setRomeNumber(1);

	}
	public function testNumberSetterThrowsExceptionIfNotRomeNum(){
		$this->expectException(InvalidArgumentException::class);
		$this->RomeNumbers->setRomeNumber("XCDa");
	}
	

	public function testRomeNumberCorrectConvert() {
		$this->RomeNumbers->setRomeNumber("XX");
		$this->assertEquals(20, $this->RomeNumbers->convertRomeNumber()); 
		$this->RomeNumbers->setRomeNumber("IX");
		$this->assertEquals(9, $this->RomeNumbers->convertRomeNumber()); 
		$this->RomeNumbers->setRomeNumber("MMIX");
		$this->assertEquals(2009, $this->RomeNumbers->convertRomeNumber()); 
		$this->RomeNumbers->setRomeNumber("MMI");
		$this->assertEquals(2001, $this->RomeNumbers->convertRomeNumber()); 
		$this->RomeNumbers->setRomeNumber("XCDDD");
		$this->assertEquals(1390, $this->RomeNumbers->convertRomeNumber()); 
		$this->RomeNumbers->setRomeNumber("MID");
		$this->assertEquals(1499, $this->RomeNumbers->convertRomeNumber()); 
	}
}