<?php

class findAWriter {
    public function getValue($input) {
		$elements = explode('|',$input);
		
		$values = str_split($input);
		$keys = explode (' ', trim($elements[1]));

		$output = "";
		foreach($keys as $item) {
			$output .= $values[$item - 1];
		}
		
		return $output;
    }
}

$class = new findAWriter();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}