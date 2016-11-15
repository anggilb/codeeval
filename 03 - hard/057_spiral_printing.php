<?php

class spiralPrinting {	
	public function getValue($input) {
		$elements = explode(';', $input);

		$matrix = array_chunk(explode(" ", $elements[2]), $elements[1]);
		 
		$output = array();
		while (true) {
			$output = array_merge($output, array_shift($matrix));
		 
			if (!empty($matrix)) {
				$matrix = call_user_func_array(
					'array_map',
					array(-1 => null) + array_map('array_reverse', $matrix)
				);
		 
				if (!is_array($matrix[0])) {
					$matrix = array($matrix);
				}
			} else {
				break;
			}
		}
		 
		return implode(' ', $output);		
	}
}

$class = new spiralPrinting();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
