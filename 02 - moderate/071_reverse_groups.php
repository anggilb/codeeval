<?php

class reverseGroups {
	public function getValue($input) {	
		$elements = explode(';', $input);
		
		$numbers = explode(',', $elements[0]);
		$num = $elements[1];
		
		$groups = array_chunk($numbers, $num);

		$output = array();
		foreach($groups as $item) {
			if ($num == count($item)) {
				$output = array_merge($output, array_reverse($item));
			} else {
				$output = array_merge($output, $item);
			}
		}
		
		return implode(',', $output);
    }
}

$class = new reverseGroups();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}