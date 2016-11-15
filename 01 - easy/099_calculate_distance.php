<?php

class calculateDistance {
    public function getValue($input) {
		$elements = explode(') (',$input);
		
		$element_1 = explode(',', substr($elements[0], 1));
		$element_2 = explode(',', substr($elements[1], 0, -1));
		
		$distance_x = $element_1[0] - $element_2[0];
		$distance_y = $element_1[1] - $element_2[1];

		return sqrt((pow($distance_x,2)) + (pow($distance_y, 2)));
    }
}

$class = new calculateDistance();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}