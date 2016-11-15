<?php

class details {	
    public function getValue($input) {		
		$elements = explode(',', $input);

		$min = 10;
		foreach ($elements as $item) {
			$value = strpos($item, 'Y') - strrpos($item, 'X') - 1;
			$min = ($value < $min) ? $value : $min;
		}
		
		return $min;
    }
}

$class = new details();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}