<?php
class minimumDistance {	
	public function getValue($input) {		
		$elements = explode(' ', $input);
		
		array_shift($elements);
	
		$min = min($elements);
		$max = max($elements);
		
		$result = -1;
		for ($i = $min; $i <= $max; $i++) {
			$dif = array_map(function($v) use ($i) {
  				return( abs($v - $i));
				}, $elements);

			$result = ($result == -1 || $result > array_sum($dif)) ? array_sum($dif) : $result;
		}
		
		return $result;
	}
}
$class = new minimumDistance();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}