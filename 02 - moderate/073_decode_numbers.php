<?php

class decodeNumbers {
    private $_counter;
    
    private function _recursive($in, $out) {
        $nIn = substr($in, 1);
        $nOut = substr($in, 0, 1);

        $flag = in_array((int) $nOut, range(1, 9));

        if (strlen($nIn) && $flag) {
            $this->_recursive($nIn, $out.$nOut);
        }

        if ($flag && !strlen($nIn)) {
            $this->_counter++;
        }
        


        $nIn = substr($in, 2);
        $nOut = substr($in, 0, 2);

        $flag = in_array((int) $nOut, range(10, 26));

        if (strlen($nIn) && $flag) {
            $this->_recursive($nIn, $out.$nOut);
        } 

        if ($flag && !strlen($nIn)) {
            $this->_counter++;
        }
    }
    
    public function getValue($input) {
        $this->_counter = 0;
        $this->_recursive($input, null);
        return $this->_counter;
    }
}

$class = new decodeNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
