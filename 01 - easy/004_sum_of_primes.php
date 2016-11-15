<?php

class deltaTime {	
    public function getValue($input) {		
		$elements = explode(' ', $input);

		date_default_timezone_set("Europe/Madrid");

		$fecha_1 = strtotime($elements[0]);
		$fecha_2 = strtotime($elements[1]);
		
		$diff = $fecha_1 - $fecha_2;
		
		return gmdate("H:i:s", abs($diff));
    }
}

$class = new deltaTime();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}