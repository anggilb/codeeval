<?php

class testing {
    public function getValue($input) {
		$elements = explode(' | ', $input);

		$count = count(array_diff_assoc(str_split($elements[0]), str_split($elements[1])));
		
		switch (true) {
			case ($count == 0):
				return 'Done';
				break;
			case ($count <= 2):
				return 'Low';
				break;
			case ($count <= 4):
				return 'Medium';
				break;
			case ($count <= 6):
				return 'High';
				break;
			default:
				return 'Critical';
				break;
		}
    }
}

$class = new testing();


foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}