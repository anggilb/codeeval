<?php

class doubleTrouble {
    public function getValue($input) {
        $half_len = strlen(trim($input)) / 2;
        $text_1 = substr($input, 0, $half_len);
        $text_2 = substr($input, $half_len);
        
        $total = 1;
        
        foreach(range(0, $half_len - 1) as $i) {
            $l_1 = $text_1[$i];
            $l_2 = $text_2[$i];
            if ($l_1 == $l_2 && $l_1 == '*') {
                $total *= 2;
            }
        
            if ($l_1 != $l_2) {
                if (($l_1 == 'A' || $l_1 == 'B') && ($l_2 == 'A' || $l_2 == 'B')) {
                    $total = 0;
                    break;
                }
            }
        }
        
        return $total;
    }
}

$class = new doubleTrouble();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
