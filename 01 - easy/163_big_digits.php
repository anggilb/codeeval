<?php

class bigDigits {
	private $_patterns = array(
		'-**----*--***--***---*---****--**--****--**---**--',
		'*--*--**-----*----*-*--*-*----*-------*-*--*-*--*-',
		'*--*---*---**---**--****-***--***----*---**---***-',
		'*--*---*--*-------*----*----*-*--*--*---*--*----*-',
		'-**---***-****-***-----*-***---**---*----**---**--',
		'--------------------------------------------------'
	);
	
    public function getValue($input, $line) {
		$value = "";
		
		$content = preg_replace('/\D/', '', $input);
		for ($i = 0; $i < strlen($content); $i++) {
			$value .= $this->_printDigitLine($content[$i], $line);
		}
		
		return $value;
    }
	
	private function _printDigitLine($digit, $line) {
		return substr($this->_patterns[$line], $digit * 5, 5);
	}
}

$class = new bigDigits();

$input = array(
	'3.1415926',
	'1.41421356',
	'01-01-1970',
	'2.7182818284',
	'4 8 15 16 23 42'
);

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	for ($i = 0; $i <= 5; $i++) {
		echo $class->getValue($line, $i).PHP_EOL;
	}
}

?>
