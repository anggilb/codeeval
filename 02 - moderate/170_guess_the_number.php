<?php

class guessTheNumber {
    public function getValue($input) {
        $elements = explode(' ', $input);

        $max = array_shift($elements);
        $min = 0;
        
        foreach($elements as $item) {
            $n = ceil(($max + $min) / 2);

            if ($item == 'Lower') {
                $max = $n - 1;
            } else if ($item == 'Higher') {
                $min = $n + 1;
            } else {
                return $n;
            }
        }
    }
}
 
$class = new guessTheNumber();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
