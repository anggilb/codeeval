<?php

class roadTrip {
    public function getValue($input) {
		$elements = explode(';', $input);

		$distances = array();
		foreach($elements as $item) {
			$num = substr($item, strpos($item, ',') + 1);
			if (false !== $num) {
				$distances[] = $num;
			}
		}
		
		sort($distances);
		
		$output = array();
		foreach($distances as $key => $item) {
			if ($key != 0) {
				$output[] = $item - $distances[$key - 1];
			} else {
				$output[] = $item;
			}
		}
		
		return implode(',', $output);
    }
}

$class = new roadTrip();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}