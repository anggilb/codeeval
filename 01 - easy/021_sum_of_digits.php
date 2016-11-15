<?php

class sumOfDigits {
    public function getValue($input) {	
		return array_sum(str_split($input));
    }
}

$class = new sumOfDigits();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}