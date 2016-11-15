<?php

class racingChars {
    private $_x;
    
    public function getValue($input) {		
        $pos = (strpos($input, 'C') + 1);
        $pos = ($pos != 1) ? $pos : (strpos($input, '_') + 1);

        switch(true) {
            case ($this->_x== NULL || $pos == $this->_x):
                $val = '|';
                break;
            case ($pos > $this->_x):
                $val = '\\';
                break;
            case ($pos < $this->_x):
                $val = '/';
                break;
        }
        
        $this->_x = $pos;
        
        $input[($pos - 1)] = $val;

        return $input;
    }
}

$class = new racingChars();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
