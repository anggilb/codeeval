<?php

class numberPairs {
    public function getValue($input) {
		$elements = explode(';', $input);

		$numbers = explode(',', $elements[0]);
		$target = $elements[1];

		$output = array();
		foreach ($numbers as $item) {
			$first = array_shift($numbers);
			foreach($numbers as $second) {
				if (($first + $second) == $target) {
					$output[] = $first . ',' . $second;
				}
			}
		}
		
		return (!empty($output)) ? implode(';', $output) : 'NULL';
    }
}

$class = new numberPairs();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
