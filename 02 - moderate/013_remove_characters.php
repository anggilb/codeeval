<?php

class removeCharacters {
    public function getValue($input) {
		$elements = explode(', ', $input);

		$output = $elements[0];
		$target = str_split($elements[1]);
		
		foreach ($target as $item) {
			$output = str_replace($item, '', $output);
		}

		return $output;
    }
}

$class = new removeCharacters();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
