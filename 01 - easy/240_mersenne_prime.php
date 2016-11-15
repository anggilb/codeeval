<?php

class mersennePrime {	
    public function getValue($input) {
		if ($input > 2047) {
			return '3, 7, 31, 127, 2047';
		} else if ($input > 127) {
			return '3, 7, 31, 127';
		} else if ($input > 31) {
			return '3, 7, 31';
		} else if ($input > 7) {
			return '3, 7';
		} else {
			return '3';
		}
    }
}

$class = new mersennePrime();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
