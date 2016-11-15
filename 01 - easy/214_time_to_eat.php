<?php

class timeToEat {
    public function getValue($input) {
		$elements = explode(' ', $input);
		
		$output = array_map(function($value){return str_replace(':', '', $value);}, $elements);
		
		sort($output);
		
		$output = array_map(function($v) {return $v[0].$v[1].':'.$v[2].$v[3].':'.$v[4].$v[5];}, array_reverse($output));
		
		return implode(' ',$output);
    }
}

$class = new timeToEat();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}