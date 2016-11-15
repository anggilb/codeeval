<?php

class armstrongNumbers {
    public function getValue($input) {
		$elements = str_split($input);
		
		$n = count($elements);

		$sum = 0;
		foreach($elements as $item) {
			$sum += pow($item, $n);	
		}
		
		return ($sum == $input) ? 'True' : 'False';
    }
}

$class = new armstrongNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}