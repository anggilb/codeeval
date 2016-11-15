<?php

class glueShreddedPieces{
    public function getValue($input) {
        $elements = explode('|', $input);
         
        $elements = array_filter($elements, function($value) { return $value !== ''; });
         
        $first = array_shift($elements);
         
        $current = $first;
        
        $count = strlen($current);
         
        $grid[] = $current;
        while(true) {
            $flag = false;
            foreach($elements as $key => $item) {
                if(substr($current, 0, ($count - 1)) == substr($item, 1)) {
                    unset($elements[$key]);
                    array_unshift($grid, $item);
                    $current = $item;
                    $flag = true;
                    break;
                }
            }
           
            if (!$flag) {
                break;
            }
        }
         
        $current = $first;
        while(true) {
            $flag = false;
            foreach($elements as $key => $item) {
                if(substr($current, 1) == substr($item, 0, ($count - 1))) {
                    unset($elements[$key]);
                    $grid[] = $item;
                    $current = $item;
                    $flag = true;
                    break;
                }
            }
           
            if (!$flag) {
                break;
            }
        }
         
        return implode(array_map(function($val) {return substr($val, 0, 1);}, $grid)).substr($current, 1);
    }
}

$class = new glueShreddedPieces();

$class = new glueShreddedPieces();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
