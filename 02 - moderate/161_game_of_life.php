<?php

class gameOfLife {
    private $_matrix;
    
    private function _getNeighbours($i, $j) {
        $count = 0;
        
        $m = $this->_matrix;
        $max = count($m);
        
        if (($i > 0) && ($j > 0) && ($m[$i - 1][$j - 1] == '*')) {
            $count++;
        }
        
        if (($i > 0) && ($j < $max - 1) && ($m[$i - 1][$j + 1] == '*')) {
            $count++;
        }
        
        if (($i < $max - 1) && ($j > 0) && ($m[$i + 1][$j - 1] == '*')) {
            $count++;
        }
        
        if (($i < $max - 1) && ($j < $max - 1) && ($m[$i + 1][$j + 1] == '*')) {
            $count++;
        }
        
        if (($i > 0) && ($m[$i - 1][$j] == '*')) {
            $count++;
        }
        
        if (($j < $max - 1) && ($m[$i][$j + 1] == '*')) {
            $count++;
        }
        
        if (($j > 0) && ($m[$i][$j - 1] == '*')) {
            $count++;
        }
        
        if (($i < $max - 1) && ($m[$i + 1][$j] == '*')) {
            $count++;
        }
        
        return $count;
    }

    private function _iterate() {
        $m = $this->_matrix;
        $count = count($m);

        $result = array();
        for($i = 0; $i < $count; $i++) {
            $line = array();
            for($j = 0; $j < $count; $j++) {
                $n = $this->_getNeighbours($i, $j);

                if (($m[$i][$j] == '*') && (in_array($n, array(2, 3)))) {
                    $line[] = '*';
                } else if (($m[$i][$j] == '*') && (!in_array($n, array(2, 3)))) {
                    $line[] = '.';
                } else if (($m[$i][$j] == '.') && (in_array($n, array(3)))) {
                    $line[] = '*';
                } else {
                    $line[] = '.';
                }
            }

            $result[] = $line;
        }

        $this->_matrix = $result;
    }

    public function read($input) {
        $this->_matrix[] = str_split($input);
    }

    public function getValue() {
        for($i = 0; $i < 10; $i++) {
            $this->_iterate();
        }

        $return = NULL;
        foreach($this->_matrix as $line) {
            $return .= implode($line).PHP_EOL;
        }
        return $return;
    }
}

$class = new gameOfLife();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    $class->read($line);
}

echo $class->getValue();

?>
