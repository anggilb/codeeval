<?php

class rightmostChar {
    public function getValue($input) {
		$elements = explode(',', $input);

		$phase = $elements[0];
		$letter = $elements[1];

		$val = strrpos($phase, $letter);
		return ($val) ? $val : -1;
    }
}

$class = new rightmostChar();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}