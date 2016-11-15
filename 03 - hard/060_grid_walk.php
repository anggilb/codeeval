<?php

class gridWalk {
    private $_grid = array();
    
    private $_count; 
    
    private function _isGood($x, $y) {
        return ((array_sum(str_split(abs($x))) + array_sum(str_split(abs($y)))) <= 19);
    }
    
    private function _addNeighbors($item) {
        $x = $item[0];
        $y = $item[1];

        if ($this->_isGood($x + 1, $y) && !in_array(array($x + 1, $y), $this->_grid)) {
            $this->_grid[] = array($x + 1, $y);
            $this->_count++;
        }

        if ($this->_isGood($x - 1, $y) && !in_array(array($x - 1, $y), $this->_grid)) {
            $this->_grid[] = array($x - 1, $y);
            $this->_count++;
        }

        if ($this->_isGood($x, $y + 1) && !in_array(array($x, $y + 1), $this->_grid)) {
            $this->_grid[] = array($x, $y + 1);
            $this->_count++;
        }

        if ($this->_isGood($x, $y - 1) && !in_array(array($x, $y - 1), $this->_grid)) {
            $this->_grid[] = array($x, $y - 1);
            $this->_count++;
        }
    }

    private function _addSubNeighbors($item) {
        $x = $item[0];
        $y = $item[1];

        if ($this->_isGood($x + 1, $y) && !in_array(array($x + 1, $y), $this->_grid)) {
            $this->_grid[] = array($x + 1, $y);
            $this->_count++;
        }
    }
    
    public function getValue() {
        $this->_grid[] = array(0, 0);
        $this->_count = 1;

        $i = 0;
        while($i < $this->_count)  {
            $this->_addNeighbors($this->_grid[$i]); 
            $i++;
        }
        
        return $this->_count;
    }
}
 
$class = new gridWalk();
echo $class->getValue();

// echo 102485