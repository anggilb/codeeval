<?php

class knightMoves{
	private $_ctl = array(array(-2, -1), array(-2, 1), array(-1, -2), array(-1, 2), array(1, -2), array(1, 2), array(2, -1), array(2, 1));
	private $_allowed_x = array("a", "b", "c", "d", "e", "f", "g", "h");
	private $_allowed_y = array(1, 2, 3, 4, 5, 6, 7, 8);

    public function getPosition($input) {	
	    $value = "";
		foreach ($this->_ctl as $item) {
			$x = chr(ord($input[0]) + $item[0]);
			$y = chr(ord($input[1]) + $item[1]);
			
		    if (in_array($x, $this->_allowed_x) && in_array($y, $this->_allowed_y)) {
                $value .= $x . $y;
	            $value .= " ";
			}
        }
        return trim($value);
    }
}

$class = new knightMoves();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getPosition($line).PHP_EOL;
}