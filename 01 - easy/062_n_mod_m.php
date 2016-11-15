<?php

class nModM {
    public function getValue($input) {
		$elements = explode(',', $input);

		$n = $elements[0];
		$m = $elements[1];
		
		return $n - ((int) ($n / $m) * $m);
    }
}

$class = new nModM();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}