<?php

class decimalToBinary {
    public function getValue($input) {		
		return base_convert($input, 10, 2);
    }
}

$class = new decimalToBinary();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
