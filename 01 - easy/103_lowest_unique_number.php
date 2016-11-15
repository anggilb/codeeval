<?php

class lowestUniqueNumber {	
    public function getValue($input) {		
		$elements = explode(' ', $input);

		$result = array_keys(array_filter(array_count_values($elements), function($v){
			return ($v == 1) ? true: false;
		}));
		
		return (count($result)) ? strpos(implode($elements), (string) min($result)) + 1 : '0';
    }
}

$class = new lowestUniqueNumber();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}