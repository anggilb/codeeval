<?php

class reverseWords {
    public function getValue($input) {		
		$words = explode(' ', $input);
		return implode(' ', array_reverse($words));
    }
}

$class = new reverseWords();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}