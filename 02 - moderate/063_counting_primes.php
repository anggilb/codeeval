<?php

class countingPrimes {
    public function getValue($input) {
		$elements = explode(',', $input);
		
		$count = 0;
		for ($i = $elements[0]; $i <= $elements[1]; $i++) {
			if ($this->_isPrime($i)) {
				$count++;
			}
		}
		
		return $count;
    }
	
	private function _isPrime($n) {
		for($x=2; $x<$n; $x++) {
      		if(($n % $x) == 0) {
		   		return false;
		  	}
    	}
 	 	return true;
	}
}

$class = new countingPrimes();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
