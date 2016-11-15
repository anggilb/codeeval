<?php

class theMajorElement {
    public function getValue($input) {		
		$elements = explode(',', $input);
		$matrix = array_count_values($elements);
		$max = max($matrix);
		$count = sizeof($elements);
		
		return ($max > $count/2) ? array_search($max, $matrix) : 'None';
    }
}

$class = new theMajorElement();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getPosition($line).PHP_EOL;
}