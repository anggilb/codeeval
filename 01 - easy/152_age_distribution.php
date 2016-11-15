<?php

class ageDistribution {
	private $_values = array('X' => array(-1 => 'E', 0 => '', 1 => 'W'), 'Y' => array(-1 => 'N', 0 => '', 1 => 'S'));
	
    public function getValue($input) {		
		switch(true) {
			case ($input < 0):
			case ($input > 100):
				return 'This program is for humans';
				break;
			case ($input <= 2):
				return 'Still in Mama\'s arms';
				break;
			case ($input <= 4):
				return 'Preschool Maniac';
				break;
			case ($input <= 11):
				return 'Elementary school';
				break;
			case ($input <= 14):
				return 'Middle school';
				break;
			case ($input <= 18):
				return 'High school';
				break;
			case ($input <= 22):
				return 'College';
				break;
			case ($input <= 65):
				return 'Working for the man';
				break;
			case ($input <= 100):
				return 'The Golden Years';
				break;
		}
    }
}

$class = new ageDistribution();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}