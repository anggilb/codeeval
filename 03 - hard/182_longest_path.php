<?php

class longestPath {
    private $_elements;
    private $_result;
   
    private function _posibles($pos) {
        $n = sqrt(count($this->_elements));
   
        $queue = array();
   
        if (($pos % $n) > 0) {
            $queue[] = $pos - 1;
        }
   
        if (($pos / $n) >= 1) {
            $queue[] = $pos - $n;
        }
   
        if (($pos % $n) < ($n - 1)) {
            $queue[] = $pos + 1;
        }
   
        if (($pos / $n) < ($n - 1)) {
            $queue[] = $pos + $n;
        }
   
        return $queue;
    }
    
    private function _rec($in, $queue, $his) {
        if (count($queue)) {
            foreach($queue as $item) {
                if (!in_array($this->_elements[$item], str_split($in))) {
                    $n_in = $in.$this->_elements[$item];
 
                    $n_queue = array_diff($this->_posibles($item), $his);
                    $n_his = array_merge($his, array($item));
                    $this->_rec($n_in, $n_queue, $n_his);
                } else {
                    if (strlen($in) > $this->_result) {
                        $this->_result = strlen($in);  
                    }
                }
            }
        } else {
            if (strlen($in) > $this->_result) {
                $this->_result = strlen($in);  
            }
        }
    }
   
    public function getValue($input) {
        $this->_elements = str_split($input);
        $this->_result = 0;
 
        $input = '';
        $range = range(0, count($this->_elements) - 1);
        $his = array();
 
        foreach($range as $queue) {
            $this->_rec($input, array($queue), $his);
        }
   
        return $this->_result;
    }
}

$class = new longestPath();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
