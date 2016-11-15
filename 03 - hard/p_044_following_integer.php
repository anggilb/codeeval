<?php

class followingInteger {
    public function getValue($input) {
        $elements = array_reverse(str_split($input));
        $count = count($elements) - 1;
       
        $flag = true;
        foreach($elements as $key => $item) {
            if ($key != $count && $item != 0 && $elements[$key + 1] != 0 && $item > $elements[$key + 1]) {
                $temp = $elements[$key + 1];
                $elements[$key + 1] = $elements[$key];
                $elements[$key] = $temp;
                $flag = false;
                break;
            }
        }
        
        $elements = array_reverse($elements);

        if ($flag) {
            foreach($elements as $key => $item) {
                if ($key != $count && $item != 0) {
                    array_splice($elements, $key + 1, 0, (string)0);
                    break;
                }
            }
        }
        
        return implode($elements);
    }
}

$class = new followingInteger();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
