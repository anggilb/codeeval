<?php

class detectingCycles {
	public function getValue($input) {
    	$elements = explode(' ', $input);
 
    	$count = count($elements);
    	$middle = (int)floor($count / 2);
   
    	for($n = $middle; $n > 0; $n--) {
        	for($i = 0; $i < ($count - $n - 1); $i++) {
            	$pattern = implode(' ', array_slice($elements, $i, $n));
            	$phase = implode(' ', array_slice($elements, $i));
            	
            	$pos = strpos($phase, $pattern, 1);
            	if(false !== $pos && $pos == strlen($pattern) + 1 && (" " != $phase[strlen($pattern)*2 + 2])) {
                	return $pattern;
            	}
        	}
    	}
    	return '';
    }
}

$class = new detectingCycles();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
