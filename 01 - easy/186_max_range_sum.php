<?php

class niceAngles {	
    public function getValue($input) {
		$degrees = (int)$input;
		$degrees_rest = $input - $degrees;
		
		$minutes = (int) ($degrees_rest * 60);
		$minutes_rest = $degrees_rest * 60 - $minutes;
		
		$seconds = (int) ($minutes_rest * 60);
		
		return $degrees.'.'.str_pad($minutes, 2, "0", STR_PAD_LEFT)."'".str_pad($seconds, 2, "0", STR_PAD_LEFT).'"';
    }
}

$class = new niceAngles();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;