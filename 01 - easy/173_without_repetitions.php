<?php
class withoutRepetitions {	
	public function getValue($input) {		
		//$elements = str_split($input);
		return preg_replace("/(.)\\1+/", "$1", $input);
	}
}
$class = new withoutRepetitions();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
