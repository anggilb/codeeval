<?php

class rollerCoaster {
    public function getValue($input) {
		$elements = str_split($input);
		
		$output = "";
		$i = 0;
		foreach($elements as $item) {
			if (ctype_alpha($item)) {
				$output .= ($i % 2) ? strtolower($item) : strtoupper($item);
				$i++;
			} else {
				$output .= $item;
			}
		}
		
		return $output;
    }
}

$class = new rollerCoaster();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}