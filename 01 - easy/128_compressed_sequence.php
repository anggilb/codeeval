<?php

class compressedSequence {
    public function getValue($input) {
		$elements = explode(' ', $input);

		$value = "";
		$processed = $this->_getCountArray($elements);
		foreach($processed as $item) {
			$value .= $item['rep'] . " " . $item['val'] . " ";
		}

		return $value;
    }
	
	private function _getCountArray($input) {
		$current = "";

		$i = -1;
		$values = array();
		foreach ($input as $item) {
			if ($current == $item) {
				$values[$i]['rep'] = $values[$i]['rep'] + 1;
			}  else {
				$i++;
				$values[] = array('val' => $item, 'rep' => 1);
				$current = $item;
			}
		}

		return $values;
	}
}

$class = new compressedSequence();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}