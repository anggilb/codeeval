<?php

class numberOfOnes {
    public function getValue($input) {		
		$elements = str_split((string) base_convert($input, 10, 2));
		$count = array_count_values($elements);
		return (isset($count['1'])) ? $count['1'] : 0;
    }
}

$class = new numberOfOnes();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
