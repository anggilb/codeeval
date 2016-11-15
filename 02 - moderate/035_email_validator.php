<?php

class emailValidation {
    public function getValue($input) {		
		return (filter_var($input, FILTER_VALIDATE_EMAIL)) ? 'true' : 'false';
    }
}

$class = new emailValidation();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
