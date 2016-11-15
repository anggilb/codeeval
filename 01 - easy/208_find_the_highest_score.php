<?php

class findTheHighestScore {
    public function getValue($input) {
		$elements = explode(' | ', $input);

		$output = array();
		foreach($elements as $item) {
			$values = explode(' ', $item);
			foreach($values as $key => $val) {
				$prev_value = (isset($output[$key])) ? $output[$key] : NULL;
				$output[$key] = ($val > $prev_value) ? $val : $prev_value;  
			}
		}
		
		return implode(' ', $output);
    }
}

$class = new findTheHighestScore();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}