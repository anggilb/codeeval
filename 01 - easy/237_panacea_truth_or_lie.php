<?php

class panaceaTruthOrLie {
    public function getValue($input) {		
		$elements = explode(' | ', $input);

		$hex = explode(' ', $elements[0]);

		$sum_hex = 0;
		foreach ($hex as $item) {
			$sum_hex += base_convert($item, 16, 10) ;
		}

		$bin = explode(' ', $elements[1]);

		$sum_bin = 0;
		foreach ($bin as $item) {
			$sum_bin += base_convert($item, 2, 10) ;
		}
		
		return ($sum_hex <= $sum_bin) ? 'True' : 'False';
    }
}

$class = new panaceaTruthOrLie();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}