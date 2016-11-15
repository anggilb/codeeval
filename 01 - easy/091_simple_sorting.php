<?php

class simpleSorting {
	public function getValue($input) {
		$elements = explode(' ', $input);
		sort($elements);
		return implode(' ', $elements);
    }
}

$class = new simpleSorting();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}