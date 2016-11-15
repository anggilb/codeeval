<?php

class firstNonRepeatedCharacter {
    public function getValue($input) {
		$elements = str_split($input);
		$counts = array_count_values($elements);

		foreach($elements as $item) {
			if ($counts[$item] == 1) {
				return $item;
			}
		}
    }
}

$class = new firstNonRepeatedCharacter();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
