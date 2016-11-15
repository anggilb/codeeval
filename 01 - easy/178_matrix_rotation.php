 <?php

class matrixRotation {
    public function getValue($input) {
		$elements = explode(' ', $input);
		
		$n = sqrt(sizeof($elements));
		
		$values = array();
		for($i = 1; $i <= sizeof($elements); $i++) {
			$mod = (0 != ($i % $n)) ? ($i % $n) : $n;
			$key = ($mod * $n) - (int) (($i - 1) / $n);
			$values[$i-1] = $elements[$key-1];
		}
		
		return strrev(implode(' ', $values));
    }
}

$class = new matrixRotation();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}