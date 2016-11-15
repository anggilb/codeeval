<?php

class jsonMenuIds {
    public function getValue($input) {
		$elements = json_decode($input, true);
		
		$output = 0;
		foreach($elements['menu']['items'] as $item) {
			if (isset($item['label'])) {
				$output += filter_var($item['label'], FILTER_SANITIZE_NUMBER_INT);
			}
		}
		
		return $output;
    }
}

$class = new jsonMenuIds();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}