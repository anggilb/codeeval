<?php

class swapNumbers {
	public function getValue($input) {
		$elements = explode(' ', $input);

		$elements = array_map(function($v){ 
			return substr($v, count($v) - 2, 1) . substr($v, 1, count($v) - 2) . substr($v, 0, 1); 
		}, $elements);
		
		return implode(' ', $elements);
    }
}

$class = new swapNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}