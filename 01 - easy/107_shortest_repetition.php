<?php

class shortestRepetition {
    public function getValue($input) {
		$max = strlen($input);
		for ($i = 1; $i <= $max; $i++) {	
			preg_match('/('.str_repeat('.', $i).')\1/', $input, $value);

			if ($value != array())
				return $i;
		}
		return $max;
    }	
}

$class = new shortestRepetition();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}