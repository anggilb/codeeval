<?php

class beautifulStrings {
    public function getValue($input) {
		$letters = str_split($input);
		
		$letters = array_map(function($letter) {
			return strtolower($letter);
		}, $letters);
		
		$letters = array_filter($letters, function($letter) {
    		return in_array($letter, range('a', 'z'));
		});

		$letters_count = array_count_values($letters);
		
		sort($letters_count, SORT_NUMERIC);
		
		$sum = 0;
		$range = array_reverse(range(1, 26));
		foreach(array_reverse($letters_count) as $key => $item) {
			$sum += ($range[$key] * $item);
		}

		return $sum;
    }
	

}

$class = new beautifulStrings();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}