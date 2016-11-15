<?php

class stringMask {
    public function getValue($input) {
		$elements = explode(' ', $input);
		
		$letters = str_split($elements[0]);
		$case = str_split($elements[1]);
		
		$var = '';
		foreach($letters as $key => $item) {
			$var .= ($case[$key] == 1) ? strtoupper($item) : $item;
		}
		
		return $var;
    }
}

$class = new stringMask();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}