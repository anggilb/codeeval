<?php


class simpleCalculator {
    private function _replacePow($input) {
        $pos = strpos($input, '^');
        
        if (false === $pos) {
            return $input;
        }
        
        $n1 = NULL;
        $par = false;
        $number = false;
        for($i = ($pos - 1); $i >= 0; $i--) {
            $char = substr($input, $i, 1);
            $n1 = $char.$n1;
            if ($char == ')') {
                $par = true;
                continue;
            } else if (!$par && !$number) {
                $number = true;
                continue;
            }
            
            if ($par && ($char == '(')) {
                $i--;
                break;
            }

            if ($number && (!in_array($char, array('1','2','3','4','5','6','7','8','9','0','-')))) {
                $n1 = substr($n1, 1);
                break;
            }
        }
        
        $n2 = NULL;
        $par = false;
        $number = false;
        for($j = ($pos + 1); $j < strlen($input); $j++) {
            $char = substr($input, $j, 1);
            $n2 .= $char;
            if ($char == '(') {
                $par = true;
                continue;
            } else if (!$par && !$number) {
                $number = true;
                continue;
            }
            
            if ($par && ($char == ')')) {
                $j++;
                break;
            }

            if ($number && (!in_array($char, array('1','2','3','4','5','6','7','8','9','0','-')))) {
                $n2 = substr($n2, 0, -1);
                break;
            }
        }

        return substr($input, 0 , $i + 1)." pow($n1, $n2) ".substr($input, $j);
    }
    
	public function getValue($input) {
	    while(false != strpos($input, '^')) {
	        $input = $this->_replacePow($input);
	    }
        $str = "\$return = $input;";
        eval($str); 
        return ($return - floor($return) != 0) ? number_format($return, 5, '.', '') : (int) $return;
	} 
}

$class = new simpleCalculator();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
