<?php

class codeCombinations {
    public function getValue($input) {
		$elements = explode(' | ', $input);

		$matrix = array();
		foreach($elements as $item) {
			$matrix[] = str_split($item);
		}
		
		$count = 0;
		$compare = array_count_values(array('c', 'o', 'd', 'e'));
		$num_i = count($matrix) - 1;
		$num_j = count($matrix[0]) - 1;
		for($i = 0; $i < $num_i; $i++) {
			for($j = 0; $j < $num_j; $j++) {
				$submatrix = array(
					$matrix[$i][$j],
					$matrix[$i + 1][$j],
					$matrix[$i][$j + 1],
					$matrix[$i + 1][$j + 1]
				);

				if (array_count_values($submatrix) == $compare) {
					$count++;
				}
			}
		}

		return $count;
    }
}

$class = new codeCombinations();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
