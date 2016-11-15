<?php

class meetCocktailSort {
    public function getValue($input) {
        list($s_elements, $it) = explode(' | ', $input);

        $elements = explode(' ', $s_elements);

        $ini = 1;
        $fin = count($elements);

        $it *= 2;
        while ($it) {
            if (($it % 2) == 0) {
                for ($i = $ini; $i < $fin; $i++) {
                    if ($elements[$i] < $elements[$i - 1]) {
                        $temp = $elements[$i];
                        $elements[$i] = $elements[$i - 1];
                        $elements[$i - 1] = $temp;
                    }
                }

                $fin--;
            } else {
                for ($j = $fin; $j >= $ini; $j--) {
                    if ($elements[$j] < $elements[$j - 1]) {
                        $temp = $elements[$j];
                        $elements[$j] = $elements[$j - 1];
                        $elements[$j - 1] = $temp;
                    }
                }

                $ini++;
            }

            $it--;
        }

        return implode(' ', $elements);
    }
}

$class = new meetCocktailSort();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
