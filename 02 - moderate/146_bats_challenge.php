<?php

class batsChallenge {
    function getValue($input) {
        $d_b = 6;
        
        $elements = explode(' ', $input);
        
        $long = array_shift($elements);
        $diff = array_shift($elements);
        $num = array_shift($elements);
        
        $elements = array_merge(array($d_b - $diff), $elements, array($long - $d_b + $diff));
    
        $count = 0;
        $ini = array_shift($elements); 
        foreach($elements as $item) {
            $val = ceil((($item - $diff) - ($ini + $diff) + 1) / $diff);
            $val = ($val > 0) ? $val : 0;
            $count += $val;
            $ini = $item;
        }
        
        return $count;
    }
}

$class = new batsChallenge();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
