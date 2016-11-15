<?php

class queryBoard {
	private $_matrix = array();
	
	public function initArray() {
		$matrix = array();
		for ($i = 0; $i <= 255; $i++) {
			$matrix[] = array(); 
			for ($j = 0; $j <= 255; $j++) {
				$matrix[$i][] = 0; 
			}
		}
		
		$this->_matrix = $matrix;
	}
	
    public function getValue($input) {
		$elements = explode(' ', $input);
		
		switch($elements[0]) {
			case 'SetCol':
				$this->_setCol($elements[1], $elements[2]);
				break;
			case 'SetRow':
				$this->_setRow($elements[1], $elements[2]);
				break;
			case 'QueryCol':
				return $this->_queryCol($elements[1]);
				break;
			case 'QueryRow':
				return $this->_queryRow($elements[1]);
				break;
		}
    }
	
	private function _setCol($i, $x) {
		for ($n = 0; $n <= 255; $n++) {
			$this->_matrix[$n][$i] = $x;
		}
	}
	
	private function _setRow($j, $x) {
		for ($n = 0; $n <= 255; $n++) {
			$this->_matrix[$j][$n] = $x;
		}
	}
	
	private function _queryCol($i) {
		$sum = 0;
		for ($n = 0; $n <= 255; $n++) {
			$sum += $this->_matrix[$n][$i];
		}
		
		return $sum;
	}
	
	private function _queryRow($j) {
		$sum = 0;
		for ($n = 0; $n <= 255; $n++) {
			$sum += $this->_matrix[$j][$n];
		}
		
		return $sum;
	}
}

$class = new queryBoard();

$class->initArray();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line);
}

