<?php namespace RomeNumbers;

use InvalidArgumentException;

class RomeNumbers {


	protected $romeNumber;
	protected $arabicEquivalentOfRomeNum = array(
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500, 
    'M' => 1000 ); 

	public function __construct($romeNumber = null){
		$this->romeNumber = $romeNumber;
	}


	public function convertRomeNumber() {
		if ($this->romeNumber == null) { throw new InvalidArgumentException; }
		return $this->convertRomeToArabic();
	}




	public function setRomeNumber($romeNumber) {
		$this->checkRomeNumberExceprion($romeNumber);
		$this->romeNumber = $romeNumber;

	}


	protected function checkRomeNumberExceprion($romeNumber) {
		if ( ! (is_string($romeNumber)) || ($romeNumber == null)) {
			throw new InvalidArgumentException;
		}
		for ($i = 0; $i < strlen($romeNumber); $i++) {
			if ( ! stristr("IVXLCDM",$romeNumber[$i]) ) {
				throw new InvalidArgumentException;
			}
		}
	}


	protected function convertRomeToArabic() {
		$lenOfRomeNumber = strlen($this->romeNumber);
		$sum = 0;
		$summed = null;
		for ($i = 0; $i < $lenOfRomeNumber; $i++) {
			if (($i + 1) < $lenOfRomeNumber) {
				if ($this->arabicEquivalentOfRomeNum[$this->romeNumber[$i]] < $this->arabicEquivalentOfRomeNum[$this->romeNumber[$i + 1]]) {
					$sum -= $this->arabicEquivalentOfRomeNum[$this->romeNumber[$i]];
					$summed = $i +1;
				} else {
					
					$sum += $this->arabicEquivalentOfRomeNum[$this->romeNumber[$i]];	
					
				}
			} else {
				$sum += $this->arabicEquivalentOfRomeNum[$this->romeNumber[$i]];	
			}		
		}	
		return $sum;
	}

}