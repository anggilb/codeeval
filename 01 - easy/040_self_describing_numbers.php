<?php

class selfDescribingNumbers {
    public function getValue($input) {		
		$elements = str_split($input);

		foreach ($elements as $key => $item) {
			if (substr_count($input, $key) != $item) {
				return '0';
			}
		}

		return '1';
    }
}

$class = new selfDescribingNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}