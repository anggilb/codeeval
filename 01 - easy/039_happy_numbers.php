<?php

class happyNumbers {	
    public function getValue($input) {
		$elements = explode(';', $input);
		
		$n = $elements[0];
		$serie = explode(' ', $elements[1]);
		
		$max = NULL;
		for($i = 0; $i <= sizeof($serie) - $n; $i++) {
			$sum = 0;
			for($j = 0; $j < $n; $j++) {
				$sum += $serie[$i + $j];
			}

			$max = ($max < $sum) ? $sum : $max;
		}

		return ($max > 0) ? $max : 0;
    }
}

$class = new happyNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;