<?php

class uniqueElements {	
    public function getValue($input) {
		$elements = explode(',', $input);
		
		$filtered = array_unique($elements);
		
		return implode(',', $filtered);
    }
}

$class = new uniqueElements();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
