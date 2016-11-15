<?php

class beatOrBit {
    private function _grayDecode($gray){
        $gray = base_convert($gray, 2, 10);
        
    	$binary = $gray;
    
    	while($gray >>= 1) {
    	    $binary ^= $gray;
    	}
    
    	return $binary;
    }

    public function getValue($input) {
        $elements = explode(' | ', $input);
        array_walk($elements, function (&$elem) { $elem = $this->_grayDecode($elem);});
        return implode(' | ', $elements);
    }
}

$class = new beatOrBit();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
