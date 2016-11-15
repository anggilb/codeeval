<?php

class cardNumberValidation {
    public function getValue($input) {
		$elements = array_reverse(str_split(str_replace(' ', '', $input)));

		$sum = 0;
		foreach($elements as $key => $item) {
			if (($key % 2) == 1) {
				$number = $item * 2;
				if ($number >= 10) {
					$sum += (substr($number, 1, 1) + substr($number, 0, 1));
				} else {
					$sum += $number;
				}
			} else {
				$sum += $item;
			}
		}

		return (($sum % 10) == 0) ? 1 : 0;
    }
}

$class = new cardNumberValidation();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
