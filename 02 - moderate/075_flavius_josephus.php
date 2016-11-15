<?php

class flaviusJosephus {
    public function getValue($input) {
		$elements = explode(',', $input);
		
		$count = $elements[0];
		$jump = $elements[1] - 1;
		
		$cycle = range(0, $count - 1);

		$output = array();
		$pos = $jump;
		while (true) {
			$output[] = $cycle[$pos];
			array_splice($cycle, $pos, 1);
			$count = count($cycle);
			if (!$count)
				break;

			$pos = ($pos + $jump) % $count;
		}
		
		return implode(' ', $output);
    }
}

$class = new flaviusJosephus();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
