<?php

class sumOfIntegers {
    public function getValue($input) {
		$elements = explode(',', $input);

		$output = NULL;
		for ($i = 0; $i < sizeof($elements); $i++) {
			for($j = (sizeof($elements) - $i); $j > 1; $j--) {
				$sum = array_sum(array_slice($elements, $i, $j));
				$output = ($output > $sum) ? $output : $sum;
			} 
		}
		
		return $output;
    }
}

$class = new sumOfIntegers();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
