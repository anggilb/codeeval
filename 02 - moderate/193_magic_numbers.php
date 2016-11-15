<?php

class magicNumbers {
	private $_matrix = array();
	
	public function init() {
		for($i = 1; $i <= 10000; $i++) {
			$this->_matrix[$i] = $this->_isMagicNumber($i);
		}
	}
	
	public function getValue($input) {
		$elements = explode(' ', $input);
		
		$output = array();
		for ($i = $elements[0]; $i <= $elements[1]; $i++) {
			if ($this->_isMagicNumber($i)) {
			//if ($this->_matrix[$i]) {
				$output[] = $i;
			}
		}
		
		return (count($output) > 0) ? implode(' ',$output) : '-1';
    }
	
	private function _isMagicNumber($value) {
		$elements = str_split($value);

		if ((max(array_count_values($elements))) > 1 ) {
			return false;
		}
		
		$count = count($elements);
		$visited = array_fill(0, $count, 'false');

		$cur = 0;
		while($visited[$cur] !== 'true') {
			$visited[$cur] = 'true';
			$ant_pos = $cur;
			$cur = ($elements[$cur] + $cur) % $count;
		}
		
		if($cur !== 0) {
			return false;
		}

		return !in_array('false', array_keys(array_count_values($visited)));
	}
}

$class = new magicNumbers();
//$class->init();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
