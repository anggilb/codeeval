<?php

class dataRecovery {
    public function getValue($input) {
		$elements = explode(';',$input);
		
		$words = explode(' ', $elements[0]);
		$pos = explode(' ', $elements[1]);
		$last = implode(array_diff(range(1, max($pos)), $pos));
		$pos[] = ($last) ? $last : (count($pos) + 2);

		$output = array();
		foreach($words as $key => $item) {
			$output[$pos[$key]] = $item;
		}

		ksort($output);

		return implode(' ', $output);
    }
}

$class = new dataRecovery();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}