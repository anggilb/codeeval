<?php

class trailingString {
    public function getValue($input) {
		$elements = explode(',', $input);
		
		return (substr_compare($elements[0], $elements[1], strlen($elements[0])-strlen($elements[1]), strlen($elements[1])) === 0) ? 1 : 0;
    }
}

$class = new trailingString();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
