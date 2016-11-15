<?php

class aPileOfBricks {
    public function getValue($input) {
		$elements = explode('|', $input);

		$part_1 = explode(' ', $elements[0]);
		if (false !== strpos($elements[1], ';')) {
			$part_2 = explode(';', $elements[1]);
		} else {
			$part_2 = array($elements[1]);
		}
		
		$hole = array();
		foreach($part_1 as $item) {
			$hole[] = explode(',', str_replace(array('[', ']'), '',$item));
		}
		
		$tam_hole = array(
			abs(intval($hole[1][0]) - intval($hole[0][0])),
			abs(intval($hole[1][1]) - intval($hole[0][1]))
		);
		
		sort($tam_hole);
		
		$tam_bricks = array();
		foreach($part_2 as $key => $item) {
			$start = strpos($item, '[');
			$end = strrpos($item, ']');

			$brick = explode(',', str_replace('] [', ',',substr($item, $start + 1, $end - $start - 1)));
			$tam_bricks[] = array(
				abs(intval($brick[3]) - intval($brick[0])),
				abs(intval($brick[4]) - intval($brick[1])),
				abs(intval($brick[5]) - intval($brick[2]))
			);
			
			sort($tam_bricks[$key]);
			
			unset($tam_bricks[$key][2]);
		}
		
		$output = array();		
		foreach ($tam_bricks as $key => $tam_brick) {
			if (($tam_brick[0] <= $tam_hole[0]) && ($tam_brick[1] <= $tam_hole[1])) {
				$output[] = $key + 1;
			}
		}
		
		return (count($output) > 0) ? implode(',', $output) : '-';
    }
}

$class = new aPileOfBricks();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
