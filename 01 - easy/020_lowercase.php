<?php

class lowercase {	
    public function getValue($input) {		
		$elements = explode(' ', $input);

		return strtolower($input);
    }
}

$class = new lowercase();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}