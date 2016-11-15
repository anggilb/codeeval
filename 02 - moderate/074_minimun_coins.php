<?php

class minimunCoins {
	private $_coins = array(5, 3, 1);
	
    public function getValue($input) {
		
		$count = 0;
		
		foreach ($this->_coins as $item) {
			$count += floor($input / $item); 
			$input = $input % $item;
		}
		
		return $count;
    }
}

$class = new minimunCoins();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
