<?php

class longestLines {
    private $_n;
    
    private $_queue = array();
    
    public function setNum($input) {
        $this->_n = $input;
    }
    
    public function setValue($input) {
        array_push($this->_queue, $input);
    }
    
    public function getValues() {
        $count = array_map(function($val) { return strlen($val); }, $this->_queue);
        
        arsort($count);
        $cKeys = array_keys($count);
        
        $return = NULL;
        for ($i = 0; $i < $this->_n; $i++) { 
            $return .= $this->_queue[array_shift($cKeys)].PHP_EOL;
        }
        
        return $return;
    }
}

$class = new longestLines();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $key => $line) {
    if (!$key) {
        $class->setNum($line);
    } else {
	    $class->setValue($line);
    }
} 

echo $class->getValues();

?>