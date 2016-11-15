<?php

class romanNumerals {
	private $_units = array(
		'U' => array('I', 'V', 'IX'),
		'D' => array('X', 'L', 'XC'), 
		'C' => array('C', 'D', 'CM'),
		'M' => array('M', NULL, NULL) 
	);
	
    public function getValue($input) {
		$dig_u = substr($input, -1);
		$dig_d = (strlen($input) >= 2) ? substr($input, -2, 1) : NULL;
		$dig_c = (strlen($input) >= 3) ? substr($input, -3, 1) : NULL;
		$dig_m = (strlen($input) == 4) ? substr($input, -4, 1) : NULL;

		$value = $this->_getUnityValue($dig_m, 'M');
		$value .= $this->_getUnityValue($dig_c, 'C');
		$value .= $this->_getUnityValue($dig_d, 'D');
		$value .= $this->_getUnityValue($dig_u, 'U');
		
		return $value;
    }
	
	private function _getUnityValue($dig, $unit) {
		switch ($dig) {
			case 1:
			case 2:
			case 3:
				return str_repeat($this->_units[$unit][0], $dig);
				break;
			case 4:
			case 5:
			case 6:
			case 7:
			case 8:
				$num_pref = ($dig == 4) ? 1 : 0;
				$pref = str_repeat($this->_units[$unit][0], $num_pref);
				$num_suf = ($dig > 5) ? ($dig - 5) : 0;
				$suf = str_repeat($this->_units[$unit][0], $num_suf);
			
				return $pref . $this->_units[$unit][1] . $suf;
				break;
			case 9:
				return $this->_units[$unit][2];
				break;
		}
	}
}

$class = new romanNumerals();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;