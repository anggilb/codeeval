<?php

class splitTheNumber {	
    public function getValue($input) {
		$elements = explode(' ', $input);
		
		$is_sum = (strpos($input, '+')) ? true : false;
		
		$type = ($is_sum) ? '+' : '-';
		$parts = explode($type, $elements[1]);
		
		$num_1 = substr($elements[0], 0, strlen($parts[0]));
		$num_2 = substr($elements[0], - strlen($parts[1]));		
		
		return ($is_sum) ? $num_1 + $num_2 : $num_1 - $num_2;
    }
}

$class = new splitTheNumber();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
