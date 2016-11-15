<?php

class jugglingWithZeros {
	public function getValue($input) {	
		$elements = explode(' ', $input);
		
		$result = NULL;
		foreach ($elements as $key => $value) {
			if (($key % 2) == 0) {
				$type = ('00' === $value) ? '1' : '0';
			} else {
				$result .= str_repeat($type, strlen($value));
			}
		}

		return base_convert($result, 2, 10);
    }
}

$class = new jugglingWithZeros();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}