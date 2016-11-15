<?php

class comparePoints {
	private $_values = array('X' => array(-1 => 'E', 0 => '', 1 => 'W'), 'Y' => array(-1 => 'N', 0 => '', 1 => 'S'));
	
    public function getValue($input) {		
		$elements = explode(' ', $input);
		
		$o = $elements[0];
		$p = $elements[1];
		$q = $elements[2];
		$r = $elements[3];
		
		$is_x = $this->_getPosition($o, $q);
		$is_y = $this->_getPosition($p, $r);
		
		$x = $this->_values['X'][$is_x];
		$y = $this->_values['Y'][$is_y];
		
		return ($y.$x) ? $y.$x : 'here'; 
    }
	
	private function _getPosition($item1, $item2) {
		if ($item1 > $item2) {
			return 1;
		} else if ($item1 == $item2) {
			return 0;
		} else {
			return -1;
		}
	}
}

$class = new comparePoints();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}