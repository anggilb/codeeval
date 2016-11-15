<?php

class alternativeReality {
    private $_counter;
    
    private function _calcPosibles($input, $coins) {
        $posibles = array_map(function($v) use($input) { return (int) floor($input / $v); }, $coins);
        return array_combine($coins, $posibles);
    }
    
    private function _recursive($value, $coins) {
        $coins = array_filter($coins, function($val) use($value) { return ($value >= $val); });
        $grid = $this->_calcPosibles($value, $coins);
    
        $coin = array_shift($coins);
        $num = array_shift($grid);
    
        for ($i = $num; 0 <= $i; $i--) {
            $new_value = $value - ($coin * $i);

            if (count($coins) && $new_value > 4) {
                $this->_recursive($new_value, $coins);
            } else {
                $this->_counter++;
            }
        }
    }
    
    public function getValue($input) {
        if ($input < 5) {
            return 1;
        }

        $this->_counter = 0;
        $this->_recursive($input, array(50,25,10,5));
        return $this->_counter;
    }
}

$class = new alternativeReality();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
