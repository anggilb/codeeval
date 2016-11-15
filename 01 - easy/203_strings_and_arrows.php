<?php

class stringsAndArrows {
    public function getValue($input) {
		$count = 0;
		while (true) {
			$val = array(strpos($input, '<--<<'), strpos($input, '>>-->'));

			if ($val[0] === false && $val[1] === false) {
				return $count;
			} else if ($val[0] !== false && $val[1] === false) {
				$input = substr($input, $val[0] + 1);
				$count++;
			} else if ($val[0] === false && $val[1] !== false) {
				$input = substr($input, $val[1] + 1);
				$count++;
			} else {
				$pos = ($val[0] > $val[1]) ? $val[1] : $val[0];
				$input = substr($input, $pos + 1);
				$count++;
			}
		}
    }
}

$class = new stringsAndArrows();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}
