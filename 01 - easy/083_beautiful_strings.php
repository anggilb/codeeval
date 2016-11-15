<?php

class cleanUpTheWords {
    public function getValue($input) {
		$letters = str_split($input);
		
		$letters = array_map(function($letter) {
			return (in_array($letter, array_merge(range('a', 'z'), range('A', 'Z')))) ? strtolower($letter) : ' ';
		}, $letters);

		return preg_replace('/\s+/', ' ', implode($letters);
    }
}

$class = new cleanUpTheWords();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}