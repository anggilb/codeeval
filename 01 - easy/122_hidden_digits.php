<?php

class hiddenDigits {
	private $_patterns = array(
		'a' => 0, 
		'b' => 1, 
		'c' => 2,
		'd' => 3, 
		'e' => 4, 
		'f' => 5,
		'g' => 6, 
		'h' => 7, 
		'i' => 8,
		'j' => 9
	);
	
    public function getValue($input) {
		$content = strtr($input, $this->_patterns);
			
		$value = preg_replace('/\D/', '', $content);
			
		return ($value) ? $value : 'NONE';
    }
}

$class = new hiddenDigits();

$input = array(
	'abcdefghik',
	'Xa,}A#5N}{xOBwYBHIlH,#W',
	"(ABW>'yy^'M{X-K}q,",
	'6240488'
);

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
