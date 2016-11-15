<?php

class arrayAbsurdity {
    public function getValue($input) {
		$elements = explode(';', $input);

		$n = $elements[0];
		$numbers = explode(',', $elements[1]);

		$count = array_count_values($numbers);
		
		return array_keys($count, max($count))[0];
    }
}

$class = new arrayAbsurdity();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
