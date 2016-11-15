<?php

class pascalsTriangle {	
	public function getValue($input) {
		$input;
		
		$output = array(1, 1, 1);
		
		if ($input == 1) {
			return 1;
		} else if ($input == 2) {
			return implode(' ', $output);
		}
		
		$middle = 1;
		$pos = 5;
		for($n = 3; $n <= $input; $n++) {
			$output[] = 1;
			
			for($i = 0; $i < $middle; $i++) {
				$output[] = $output[$pos + $i - $middle - 2] + $output[$pos + $i - $middle - 1];
			}
			$middle++;
			$pos = ($n == 3) ? $pos + 2 : $pos + $n;
			
			$output[] = 1;
		}
		
		return implode(' ', $output);
	}
}

$class = new pascalsTriangle();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
