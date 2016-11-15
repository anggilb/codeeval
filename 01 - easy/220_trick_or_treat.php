<?php

class trickOrTreat {
    public function getValue($input) {		
		$elements = explode(', ', $input);
		
		$output = 0;
		$num = 0;
		foreach($elements as $item) {
			$phase = explode(': ', $item);

			switch($phase[0][0]) {
				case 'V':
					$factor = 3;
					$num += $phase[1];
					break;
				case 'Z':
					$factor = 4;
					$num += $phase[1];
					break;
				case 'W':
					$factor = 5;
					$num += $phase[1];
					break;
				default:
					$factor = 0;
					$houses = $phase[1];
					break;
			}
			
			$output += $factor * $phase[1];
		}
		
		return (int) ($output * $houses / $num);
    }
}

$class = new trickOrTreat();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}