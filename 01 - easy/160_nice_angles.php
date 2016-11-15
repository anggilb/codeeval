<?php

class happyNumbers {	
    public function getValue($input) {
		$passed = array();
		while(true) {
			if ($input == 1) return 1;
			
			$sum = 0;
			foreach(str_split($input) as $item) {
				$sum += $item*$item; 
			}
			
			if (in_array($sum, $passed)) {
				return 0;
			} else {
				$passed[] = $sum;
			}
			
			$input = $sum;
		}
    }
}

$class = new happyNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;