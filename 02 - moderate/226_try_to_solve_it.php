<?php

class tryToSolveIt {
    public function getValue($input) {		
		$elements = str_split($input);

		$alphabet = 'abcdefghijklmuvwxyznopqrst';

		$output = NULL;
		foreach($elements as $item) {
			$pos = strpos($alphabet, $item);
			$pos = ($pos < 13) ? $pos + 13 : $pos - 13;
			$output .= $alphabet[$pos];
		}
		
		return $output;
    }
}

$class = new tryToSolveIt();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
