<?php

class romanAndArabic {
	private $_values = array('I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
	
    public function getValue($input) {
		$elements = str_split($input);

		$count = 0;
		foreach($elements as $key => $item) {
			if (($key % 2) == 0) {
				$a = $item;
			} else {
				$r = $this->_values[$item];
				$sense = ((count($elements) > $key + 2) && ($r < $this->_values[$elements[$key + 2]])) ? -1 : 1;
				$count += $a * $r * $sense;
			}
		}
		
		return $count;
    }
}

$class = new romanAndArabic();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
