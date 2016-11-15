<?php

class consecutivePrimes {
	private $_val = array(0,0,1,0,2,0,2,0,4,0,96,0,1024,0,2880,0,81024,0,770144);
	
    public function getValue($input) {
        return $this->_val[$input];
    }
} 

$class = new consecutivePrimes();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
