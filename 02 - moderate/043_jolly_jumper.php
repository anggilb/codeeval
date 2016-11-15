<?php

class jollyJumper {
    public function getValue($input) {
		$elements = explode(' ', $input);
		$n = count($elements) - 1;
		$diffs = array();

		for ($i = 1; $i < $n; $i++) {
			$diff = abs($elements[$i] - $elements[$i + 1]);
			if ($diff < 1 || $diff > $n || $diffs[$diff]) {
				return 'Not jolly';
			}
			$diffs[$diff] = true;
		}
		
		return 'Jolly';
    }
}

$class = new jollyJumper();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
