<?php

class fibonacciSeries {	
    public function getValue($input) {
		$tau = (1 + sqrt(5))/2;
		
		return (pow($tau, $input) - pow(1 - $tau, $input))/ sqrt(5);;
    }
}

$class = new fibonacciSeries();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;