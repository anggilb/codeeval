<?php

class wordToDigit {
    public function getValue($input) {		
		$elements = explode(';', $input);
		
		$output = "";
		foreach($elements as $item) {
			switch($item) {
				case 'zero':
					$output .= 0;
					break;
				case 'one':
					$output .= 1;
					break;
				case 'two':
					$output .= 2;
					break;
				case 'three':
					$output .= 3;
					break;
				case 'four':
					$output .= 4;
					break;
				case 'five':
					$output .= 5;
					break;
				case 'six':
					$output .= 6;
					break;
				case 'seven':
					$output .= 7;
					break;
				case 'eight':
					$output .= 8;
					break;
				case 'nine':
					$output .= 9;
					break;
			}
		}
		
		return $output;
    }
}

$class = new wordToDigit(); 

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}