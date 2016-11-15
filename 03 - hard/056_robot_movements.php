<?php

class robotMovements {
    private $_moves = array(
        0 => array(1, 4),
        1 => array(0, 2, 5),
        2 => array(1, 3, 6),
        3 => array(2, 7),
        4 => array(0, 5, 8),
        5 => array(1, 4, 6, 9),
        6 => array(2, 5, 7, 10),
        7 => array(3, 6, 11),
        8 => array(4, 9, 12),
        9 => array(5, 8, 10, 13),
        10 => array(6, 9, 11, 14),
        11 => array(7, 10, 15),
        12 => array(8, 13),
        13 => array(9, 12, 14),
        14 => array(10, 13, 15),
        15 => array(11, 14)
    );
   
    private $_count;
   
    private function _rec($in, $hist) {
        $hist[] = $in;
   
        foreach($this->_moves[$in] as $item) {
            if (!in_array($item, $hist) && $item != 15) {
                $this->_rec($item, $hist);
            } else if ($item == 15) {
                $this->_count++;
            }
        }
    }
   
    public function getValue() {
        $pos = 0;
        $hist = array();
 
        $this->_count = 0;
        foreach($this->_moves[$pos] as $item) {
            $this->_rec($pos, $hist);
        }
 
        return $this->_count;
    }
}
 
$class = new robotMovements();
echo $class->getValue();

?>
