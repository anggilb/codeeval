<?php

class prefixExpressions {
    public function getValue($input) {
        $nums = explode(' ', $input);

        $ops = array_reverse(array_splice($nums, 0, floor(count($nums) / 2)));
        
        $expr = "\$eval = ".str_repeat('(', count($ops)).$nums[0];
        foreach($ops as $k => $op) {
            $expr .= " ".$op." ".$nums[$k + 1].")";
        }
        $expr .= ';';
        
        eval($expr);
        
        return $eval;
    }
}

$class = new prefixExpressions();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
