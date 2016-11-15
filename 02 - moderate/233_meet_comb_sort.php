<?php

class meetCombSort {
    public function getValue($input) {
        $elements = explode(' ', $input);

        $l = $gap = count($elements);
        $swaps = true;
        $iterations = -1;

        while ($gap > 1 || $swaps) {
            $iterations += 1;
    
            $gap = max(floor($gap / 1.25), 1);
            $swaps = false;
            foreach(range(0, $l - $gap - 1) as $i) {
                list($a, $b) = array($elements[$i], $elements[$i + $gap]);
                if ($b < $a) {
                    list($elements[$i], $elements[$i + $gap]) = array($b, $a);
                    $swaps = true;
                }
                $i += 1;
            }
        }
    
        return $iterations;
    }
}


$class = new meetCombSort();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
