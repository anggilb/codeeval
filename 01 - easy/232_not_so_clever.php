<?php

class notSoClever {
    public function getValue($input) {
		$elements = explode(' | ', $input);

		$numbers = explode(' ', $elements[0]);
		$num_it = $elements[1];

		$i = 1;
		$j = 1;
		$changed = false;
		while ($i <= $num_it) {
			if ($j == sizeof($numbers)) {
				$j = 1;
				if ($changed) {
					$changed = false;
				} else {
					break;
				}
			}

			if ($numbers[$j] < $numbers[$j - 1]) {
				$temp = $numbers[$j];
				$numbers[$j] = $numbers[$j - 1];
				$numbers[$j - 1] = $temp;
				$i++;
				$changed = true;
				$j = 1;
			} else {
				$j++;
			}
		}
		
		return implode(' ', $numbers);
    }
}

$class = new notSoClever();


foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}