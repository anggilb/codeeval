<?php

class bitPositions {	
    public function getValue($input) {		
		$elements = explode(',', $input);

		$n = (string) base_convert($elements[0], 10, 2);

		return ($n[strlen($n) - $elements[1]] == $n[strlen($n) - $elements[2]]) ? 'true' : 'false';
    }
}

$class = new bitPositions();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
