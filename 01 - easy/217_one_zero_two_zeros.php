<?php

class oneZeroTwoZeros {	
	public function getValue($input) {
		$numbers = explode(' ', $input);
		$num_zeros = $numbers[0];
		$max_range = $numbers[1];

		$value = 0;
		for ($i = 1; $i <= $max_range; $i++) {
			if (substr_count(decbin($i), 0) == $num_zeros) {
				$value++;
			}
		}
		return $value;
	}
}

$class = new oneZeroTwoZeros();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;