<?php

class primePalindrome {
    public function getValue() {
		for ($i = 999; $i > 0; $i--) {
			if ($this->_isPrimeNumber($i) && $i == strrev($i)) {
				return $i;
			}		
		}
    }
	
	private function _isPrimeNumber($i) {
        $n = 2;
        while ($n < $i) {
            if ($i % $n) {
                $n++;
                continue;
            }

            return false;
        }

        return true;
	}
}

$class = new primePalindrome();

echo $class->getValue().PHP_EOL;

?>