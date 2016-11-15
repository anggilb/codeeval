<?php

class wordChain {
    private $_elements = array();
    
    private $_max;

    private function _rec($in, $out) {
        $elements = $this->_elements;
        $count = count($out);
        
        foreach($in as $item) {
            $strItem = $elements[$item];
            
            if (substr($out[$count - 1], strlen($out[$count - 1]) - 1, 1) == substr($strItem, 0, 1)) {
                $temp = $out;
                $temp[] = $strItem;
                if (($count + 1) > $this->_max) {
                    $this->_max = ($count + 1);
                }

                $this->_rec(array_diff($in, array($item)), $temp);
            }
        }
    }

    public function getValue($input) {
        $elements = explode(',', $input);
        $this->_elements = $elements;

        $count = count($elements);
        
        $this->_max = 0;

        foreach($elements as $key => $item) {
            $this->_rec(array_diff(range(0, $count - 1), array($key)), array($item));
        }

        return ($this->_max) ? $this->_max : 'None';
    }
}

$class = new wordChain();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
