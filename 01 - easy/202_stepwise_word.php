<?php

class stepwiseWord {
	public function getValue($input) {
		$elements = explode(' ', $input);
		$count = array_map(function($value){return strlen($value);}, $elements);

		$max_key = array_search(max($count), $count);

		$letters = str_split($elements[$max_key]);
		
		$output = array();
		foreach($letters as $key => $item) {
			$output[] = str_repeat('*', $key).$item;
		}

		return implode(' ', $output);
    }
}

$class = new stepwiseWord();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}