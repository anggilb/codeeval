<?php

class capitalizeWords {
    public function getValue($input) {
		$elements = explode(' ', $input);
		$e = array_map(function($value) {return ucfirst($value);}, $elements);
		return implode(' ', $e);
    }
}

$class = new capitalizeWords();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}