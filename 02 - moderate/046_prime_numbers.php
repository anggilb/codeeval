<?php

class primeNumbers {
    private function _isPrime($num) {
        if($num == 1)
            return false;
    
        if($num == 2)
            return true;
    
        if($num % 2 == 0) {
            return false;
        }
    
        for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
            if($num % $i == 0)
                return false;
        }
    
        return true;
    }

    public function getValue($input) {
        $output = array();
        
        for($i=1; $i < $input; $i++) {
            if ($this->_isPrime($i)) {
                $output[] = $i;
            }
        }

        return implode(',', $output);
    }
}

$class = new primeNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
