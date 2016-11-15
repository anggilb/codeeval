<?php

class stackImplementation {
    public function getValue($input) {		
		$elements = array_reverse(explode(' ', $input));

		return implode(' ', array_filter($elements, function($k){return(!($k % 2));}, ARRAY_FILTER_USE_KEY));
    }
}

$class = new stackImplementation();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
