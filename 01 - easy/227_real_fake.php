<?php

class realFake {
    public function getValue($input) {
		$string = str_replace(' ', '', $input);
		
		$elements = str_split($string);
		
		$func = function($valor, $key) {
			return (1 == $key % 2) ? $valor * 2 : $valor;
		};

		return (0 === array_sum(array_map($func, $elements, range(1, 16))) % 10) ? 'Real' : 'Fake';
    }
}

$class = new realFake();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}