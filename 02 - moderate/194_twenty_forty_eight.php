<?php

class twentyFortyEight {
    private function _turnMatrix90($matrix) {
        $new = array();
        foreach($matrix as $key1 => $item1) {
            foreach($item1 as $key2 => $item2) {
                $new[$key1][$key2] = $matrix[count($matrix) - $key2 - 1][$key1];
            }
        }
        return $new;
    }
    
    private function _turnMatrix180($matrix) {
        $new = array();
        foreach($matrix as $key1 => $item1) {
            foreach($item1 as $key2 => $item2) {
                $new[$key2][$key1] = $matrix[count($matrix) - $key2 - 1][count($matrix) - $key1 - 1];
            }
        }
        return $new;
    }
    
    private function _turnMatrix270($matrix) {
        $new = array();
        foreach($matrix as $key1 => $item1) {
            foreach($item1 as $key2 => $item2) {
                $new[$key1][$key2] = $matrix[$key2][count($matrix) - $key1 - 1];
            }
        }
        return $new;
    }

    private function _setLeft($matrix, $n) {
        $new = array();
        for($i = 0; $i < $n; $i++) {
            $temp = array();
            $pos = 0;
            for($j = 0; $j < $n; $j++) {
                if (($matrix[$i][$j] != 0)) {
                    $temp[] = (int) $matrix[$i][$j];
                    $pos++;
                }
            }

            $last = NULL;
            $count = $pos;
            for($j = 0; $j < $count; $j++) {
                $var = $temp[$j];
                if (($var != 0) && ($var == $last)) {
                    $temp[$j - 1] = $var * 2;
                    unset($temp[$j]);
                    $pos--;
                    $last = NULL;
                } else {
                    $last = $var;
                }
            }
  
            $new[] = array_merge($temp, array_fill($pos, $n - $pos, 0));
        }
        
        return $new;
    }

    private function _setDown($matrix, $n) {
        return $this->_turnMatrix270($this->_setLeft($this->_turnMatrix90($matrix), $n));
    }
    
    private function _setUp($matrix, $n) {
        return $this->_turnMatrix90($this->_setLeft($this->_turnMatrix270($matrix), $n));
    }
    
    private function _setRight($matrix, $n) {
        return $this->_turnMatrix180($this->_setLeft($this->_turnMatrix180($matrix), $n));
    }
    
    function getValue($input) {
        list($way, $n, $list) = explode('; ', $input);
        
        $subLists = explode('|', $list);
        
        $matrix = array();
        foreach($subLists as $item) {
            $matrix[] = explode(' ', $item);
        }
    
        switch ($way) {
            case 'UP':
                $new = $this->_setUp($matrix, $n);
                break;
            case 'DOWN':
                $new = $this->_setDown($matrix, $n);
                break;
            case 'RIGHT':
                $new = $this->_setRight($matrix, $n);
                break;
            case 'LEFT':
                $new = $this->_setLeft($matrix, $n);
                break;
        }

        $result = array();
        foreach($new as $line) {
            $result[] = implode(' ', $line);
        }
        return implode('|', $result);
    }

}

$class = new twentyFortyEight();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
