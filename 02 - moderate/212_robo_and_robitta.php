<?php

class roboAndRobitta {
	public function getValue($input) {
		$elements = explode(' | ', $input);

		$dim = explode('x', $elements[0]);
		$fin = explode(' ', $elements[1]);

		$count = 0;

		$max_x = $dim[0];
		$min_x = 1;
		$max_y = $dim[1];
		$min_y = 1;

		$x = 1;
		$y = $max_y;
		$way_x = true;
		$way_sum = true;
		while (true) {
			$count++;
			if (($fin[0] == $x) && ($fin[1] == $y) || $count == 5000) return $count;
			
			if ($way_x && $way_sum) {
				$change_x = true;
				$change_y = false;
				$x++;
			} else if ($way_x && !$way_sum) {
				$change_x = true;
				$change_y = false;
				$x--;
			} else if (!$way_x && $way_sum) {
				$change_x = false;
				$change_y = true;
				$y++;
			} else if (!$way_x && !$way_sum) {
				$change_x = false;
				$change_y = true;
				$y--;
			}

			if ($max_x == $x && $min_y == $y && $change_y && $max_x != $min_x) {
				$way_x = true;
				$way_sum = false;
				$max_x--;
			} else if ($min_x == $x && $max_y == $y && $change_y && $max_x != $min_x) {
				$way_x = true;
				$way_sum = true;
				$min_x++;
			} else if ($max_y == $y  && $max_x == $x && $change_x && $max_y != $min_y) {
				$way_x = false;
				$way_sum = false;
				$max_y--;
			} else if ($min_y == $y  && $min_x == $x && $change_x && $max_y != $min_y) {
				$way_x = false;
				$way_sum = true;
				$min_y++;
			}
		}
	}
}

$class = new roboAndRobitta();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
