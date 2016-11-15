<?php

class columnNames {
	public function getValue($input) {
		$letters = array_merge(array(0 => NULL), range('A', 'Z'));

		$elem1 = floor($input / 676);
		$mod = $input % 676;

		$elem2 = floor($mod / 26);
		$elem3 =  $mod % 26;
		
		if ($elem1 && !$elem2 && !$elem3) {
			$elem1--;
			$elem2 = 25;
			$elem3 = 26;
		}	
									  
		if ($elem2 && !$elem3) {
			$elem2--;
			$elem3 = 26;
		}						  

		if ($elem1 && !$elem2) {
			$elem1--;
			$elem2 = 26;
		}

		return $letters[$elem1].$letters[$elem2].$letters[$elem3];
    }
}

$class = new columnNames();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}