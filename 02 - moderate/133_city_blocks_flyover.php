<?php

class cityBlocksFlyover {
	public function getValue($input) {
		$elements = explode(') (', $input);
	
		$var_x = explode(',', substr($elements[0], 1));
		$var_y = explode(',', substr($elements[1], 0, count($elements[1]) - 2));

		$d = $var_x[count($var_x) - 1] / $var_y[count($var_y) - 1];

		$output =  array_merge(
						array_map(function($n, $d){ return($n * $d);}, $var_y, array_fill(0, count($var_y), $d)), 
						$var_x);		
		return count(array_unique($output)) - 1;
    }
}

$class = new cityBlocksFlyover();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
