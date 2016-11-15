<?php

class hexToDecimal {
    public function getValue($input) {
		return base_convert($input, 16, 10);
    }
}

$class = new hexToDecimal();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}