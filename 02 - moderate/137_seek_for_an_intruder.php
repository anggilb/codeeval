<?php

class seekForAnIntruder {
	private $_patterns = array();
	
	private $_ips = array();

	public function init() {
		$dotted_decimal_pattern = '(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[1-9])';
		$dotted_decimal_pattern .= '\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])';
		$dotted_decimal_pattern .= '\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])';
		$dotted_decimal_pattern .= '\.(25[0-4]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])';
		$dotted_decimal_pattern = '/'.$dotted_decimal_pattern.'/';

		$decimal_pattern = '/(';
		$decimal_pattern .= '429496729[0-4]';
		$decimal_pattern .= '|42949672[0-8][0-9]';
		$decimal_pattern .= '|4294967[0-2][0-9]{2}';
		$decimal_pattern .= '|429496[0-7][0-9]{3}';
		$decimal_pattern .= '|42949[0-6][0-9]{4}';
		$decimal_pattern .= '|4294[0-8][0-9]{5}';
		$decimal_pattern .= '|429[0-3][0-9]{6}';
		$decimal_pattern .= '|42[0-8][0-9]{7}';
		$decimal_pattern .= '|4[0-1][0-9]{8}';
		$decimal_pattern .= '|[1-9][0-9]{8}';
		$decimal_pattern .= '|1677721[6-9]';
		$decimal_pattern .= '|167772[2-9][0-9]';
		$decimal_pattern .= '|16777[3-9][0-9]{2}';
		$decimal_pattern .= '|1677[8-9][0-9]{3}';
		$decimal_pattern .= '|167[8-9][0-9]{4}';
		$decimal_pattern .= '|16[8-9][0-9]{5}';
		$decimal_pattern .= '|1[7-9][0-9]{6}';
		$decimal_pattern .= '|[2-9][0-9]{7}';
		$decimal_pattern .= ')/';

		$dotted_hexa_pattern = '(0x[1-f][0-f]|0x0[1-f]|0x[1-f])';
		$dotted_hexa_pattern .= '\.(0x[0-f]{2}|0x0)';
		$dotted_hexa_pattern .= '\.(0x[0-f]{2}|0x0)';
		$dotted_hexa_pattern .= '\.(0xf[0-e]|0x[1-e][0-f]|0x0[0-f]|0x0)';
		$dotted_hexa_pattern = '/'.$dotted_hexa_pattern.'/';
					
		$hexa_pattern = str_replace('\.','',$dotted_hexa_pattern);
		$hexa_pattern = str_replace('/','',$hexa_pattern);
		$hexa_pattern = '/0x' . str_replace('0x','',$hexa_pattern).'/';

		$dotted_octal_pattern = '(0[1-3][0-7]{2}|00[1-7][0-7]|000[1-7])';
		$dotted_octal_pattern .= '\.(0[1-3][0-7]{2}|00[0-7]{2})';
		$dotted_octal_pattern .= '\.(0[1-3][0-7]{2}|00[0-7]{2})';
		$dotted_octal_pattern .= '\.(037[0-6]|03[0-6][0-7]|0[1-2][0-7]|00[0-7]{2})';
		$dotted_octal_pattern = '/'.$dotted_octal_pattern.'/';

		$octal_pattern = '/(';
		$octal_pattern .=  '3777777777[0-6]';
		$octal_pattern .= '|377777777[0-6][0-7]';
		$octal_pattern .= '|37777777[0-6][0-7]{2}';
		$octal_pattern .= '|3777777[0-6][0-7]{3}';
		$octal_pattern .= '|377777[0-6][0-7]{4}';
		$octal_pattern .= '|37777[0-6][0-7]{5}';
		$octal_pattern .= '|3777[0-6][0-7]{6}';
		$octal_pattern .= '|377[0-6][0-7]{7}';
		$octal_pattern .= '|37[0-6][0-7]{8}';
		$octal_pattern .= '|3[0-6][0-7]{9}';
		$octal_pattern .= '|[1-2][0-7]{10}';
		$octal_pattern .= '|[1-7][0-7]{8}';
		$octal_pattern .= ')/';

		$dotted_binary_pattern = '([0-1]{7}1|[0-1]{6}1[0-1]|[0-1]{5}1[0-1]{2}|[0-1]{4}1[0-1]{3}|[0-1]{3}1[0-1]{4}|[0-1]{2}1[0-1]{5}|[0-1]1[0-1]{6}|1[0-1]{7})';
		$dotted_binary_pattern .= '\.([0-1]{8})';
		$dotted_binary_pattern .= '\.([0-1]{8})';
		$dotted_binary_pattern .= '\.([0-1]{7}0|[0-1]{6}0[0-1]|[0-1]{5}0[0-1]{2}|[0-1]{4}0[0-1]{3}|[0-1]{3}0[0-1]{4}|[0-1]{2}0[0-1]{5}|[0-1]0[0-1]{6}|0[0-1]{7})';
		$dotted_binary_pattern = '/'.$dotted_binary_pattern.'/';

		$binary_pattern = str_replace('\.','',$dotted_binary_pattern);

		$this->_patterns = array(
			'dotted_hexa_pattern' => $dotted_hexa_pattern,
			'dotted_binary_pattern' => $dotted_binary_pattern,
			'dotted_octal_pattern' => $dotted_octal_pattern,
			'dotted_decimal_pattern' => $dotted_decimal_pattern,
			'hexa_pattern' => $hexa_pattern,
			'binary_pattern' => $binary_pattern,
			'octal_pattern' => $octal_pattern,
			'decimal_pattern' => $decimal_pattern,  
		);

		$this->_ips = array();
	}
	
	public function setLine($line) {
		$line = trim($line);
		foreach($this->_patterns as $name => $pattern){
			if( preg_match_all($pattern, $line, $matches_sets, PREG_SET_ORDER ) ){
				for($i=0, $cnt = count($matches_sets) ; $i < $cnt ; $i++){
					$matches = $matches_sets[$i];
					$ip = false;
					switch( $name ){
						case 'dotted_hexa_pattern' :
							$ip = hexdec($matches[1]).'.'.hexdec($matches[2]).'.'.hexdec($matches[3]).'.'.hexdec($matches[4]);
						break;
						case 'dotted_binary_pattern' :
							$ip = bindec($matches[1]).'.'.bindec($matches[2]).'.'.bindec($matches[3]).'.'.bindec($matches[4]);
						break;
						case 'dotted_octal_pattern' :
							$ip = octdec($matches[1]).'.'.octdec($matches[2]).'.'.octdec($matches[3]).'.'.octdec($matches[4]);
						break;
						case 'dotted_decimal_pattern' :
							$ip = $matches[1].'.'.$matches[2].'.'.$matches[3].'.'.$matches[4];
						break;
						case 'hexa_pattern' :
							$ip = hexdec($matches[1]).'.'.hexdec($matches[2]).'.'.hexdec($matches[3]).'.'.hexdec($matches[4]);
						break;
						case 'binary_pattern' :
							$ip = bindec($matches[1]).'.'.bindec($matches[2]).'.'.bindec($matches[3]).'.'.bindec($matches[4]);
						break;
						case 'octal_pattern' :
							$bin = sprintf('%32b',octdec($matches[1]));
							$bin = str_split($bin,8);
							$ip = bindec($bin[0]).'.'.bindec($bin[1]).'.'.bindec($bin[2]).'.'.bindec($bin[3]);
						break;
						case 'decimal_pattern' :
							$bin = sprintf('%32b',$matches[1]);
							$bin = str_split($bin,8);
							$ip = bindec($bin[0]).'.'.bindec($bin[1]).'.'.bindec($bin[2]).'.'.bindec($bin[3]);
						break;                                    
					}

					if( $ip ){
						if( !isset($this->_ips[$ip]) ){
							$this->_ips[$ip] = 0;
						}
						$this->_ips[$ip]++;
					}
				}
			}
		}
	}
	
	public function getResult() {
		arsort($this->_ips);
		list($k,$v) = each($this->_ips);
		$this->_ips = array_keys($this->_ips, $v);
		sort($this->_ips);
		return implode(' ',$this->_ips).PHP_EOL;
	}
}

$class = new seekForAnIntruder();

$class->init();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	$class->setLine($line);
}
echo $class->getResult();

?>
