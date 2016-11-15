<?php

class swapCase {
	public function getValue($input) {	
		$elements = str_split($input);

		return implode(array_map(		
			function($value) {
				if (!ctype_alpha($value))
					return $value;

				return (ctype_upper($value)) ? strtolower($value) : strtoupper($value); 
			}
			, $elements));
    }
}

$class = new swapCase();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}