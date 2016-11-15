<?php

class lettercasePercentageRatio {
	public function getValue($input) {	
		$elements = str_split($input);
		
		$num_upper = $num_lower = 0;
		
		foreach($elements as $letter) {
			switch (true) {
				case ctype_upper($letter):
					$num_upper++;
					break;
				case ctype_lower($letter):
					$num_lower++;
					break;
			}
		}
		
		$per_upper = ($num_upper * 100) / ($num_upper + $num_lower);
		$per_lower = ($num_lower * 100) / ($num_upper + $num_lower);
		
		return 'lowercase: '.number_format((float)$per_lower, 2, '.', '').' uppercase: '.number_format((float)$per_upper, 2, '.', '');
    }
}

$class = new lettercasePercentageRatio();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}