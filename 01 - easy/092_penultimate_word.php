<?php

class penultimateWord {
    public function getValue($input) {
		$words = explode(' ', $input);

		return $words[sizeof($words)-2];
    }	
}

$class = new penultimateWord();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;