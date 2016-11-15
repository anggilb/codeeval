<?php

class doubleSquares {
    public function getValue($input) {
        $p = sqrt($input / 2.0);
        $total = 0;
        for ($i = 0; $i <= $p; $i++) {
            $j = sqrt($input - $i*$i);
            if ($j - (int)$j == 0.0) {
                $total++;
            }
        }
      return $total;
    }
}

$class = new doubleSquares();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $key => $line) {
	if ($key) {
		echo $class->getValue($line).PHP_EOL;
	}
}

?>
