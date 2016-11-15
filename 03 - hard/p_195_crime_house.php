<?php

class crimeHouse {	
	public function getValue($input) {		
    	$elements = explode('; ', $input);
 
    	$counter = NULL;
    	foreach(explode('|', $elements[1]) as $move) {
        	$val = explode(' ', $move);
       
        	if ($val[0] == 'E') {
            	$counter++;
        	} else if (($val[0] == 'L') && ($counter > 0)) {
            	$counter--;
        	}       
    	}
   
    	return (is_null($counter)) ? 'CRIME TIME' : $counter;
	} 
}
$class = new crimeHouse();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
