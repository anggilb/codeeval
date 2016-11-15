<?php

class interruptedBubbleSort {
    public function getValue($input) {
		$elements = explode(' | ', $input);
		
		$num_it = $elements[1];
		$numbers = explode(' ', $elements[0]);
		
		for ($i = 0; $i < $num_it; $i++) {
			$flag_orden = true;

			foreach($numbers as $key => $item) {
				if ($key == 0) continue;
				
				if ($numbers[$key - 1] > $item) {
					$temp = $numbers[$key];
					$numbers[$key] = $numbers[$key - 1];
					$numbers[$key - 1] = $temp;
					$flag_orden = false;
				}
			}
			
			if (true == $flag_orden) break;
		}
		
		return implode(' ', $numbers);
    }
}

$class = new interruptedBubbleSort();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
