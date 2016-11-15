<?php

class multiplyLists {
    public function getValue($input) {		
		$elements = explode(' | ', $input);
		
		$part_1 = explode(' ', $elements[0]);
		$part_2 = explode(' ', $elements[1]);
		
		$ouput = array();
		for($i = 0; $i < count($part_1); $i++) {
			$output[] = $part_1[$i] * $part_2[$i];
		}
		
		return implode(' ', $output); 
    }
}

$class = new multiplyLists();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}