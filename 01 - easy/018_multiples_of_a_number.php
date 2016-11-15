<?php

class multiplesOfANumber {
    public function getValue($input) {
		$elements = explode(',', $input);
		
		$x = $elements[0];
		$n = $elements[1];
		
		$value = 0;
		while (true) {
			$value += $n;
			if ($value >= $x) {
				return $value;
			}
		}
    }
}

$class = new multiplesOfANumber();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}