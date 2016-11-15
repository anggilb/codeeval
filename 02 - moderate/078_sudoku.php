<?php

class sudoku {
	private $_ranges = array(
		'4' => array(
			1 => array(
				array(0, 1, 2, 3),
				array(4, 5, 6, 7),
				array(8, 9, 10, 11),
				array(12, 13, 14, 15)
			),
			2 => array(
				array(0, 4, 8, 12),
				array(1, 5, 9, 13),
				array(2, 6, 10, 14),
				array(3, 7, 11, 15)
			),
			3 => array(
				array(0, 1, 4, 5),
				array(2, 3, 6, 7),
				array(8, 9, 12, 13),
				array(10, 11, 14, 15)
			)
		),
		'9' => array(
			1 => array(
				array(0, 1, 2, 3, 4, 5, 6, 7, 8), 
				array(9, 10, 11, 12, 13, 14, 15, 16, 17),
				array(18, 19, 20, 21, 22, 23, 24, 25, 26),
				array(27, 28, 29, 30, 31, 32, 33, 34, 35),
				array(36, 37, 38, 39, 40, 41, 42, 43, 44),
				array(45, 46, 47, 48, 49, 50, 51, 52, 53),
				array(54, 55, 56, 57, 58, 59, 60, 61, 62),
				array(63, 64, 65, 66, 67, 68, 69, 70, 71),
				array(72, 73, 74, 75, 76, 77, 78, 79, 80)
			),
			2 => array(
				array(0, 9, 18, 27, 36, 45, 54, 63, 72), 
				array(1, 10, 19, 28, 37, 46, 55, 64, 73),
				array(2, 11, 20, 29, 38, 47, 56, 65, 74),
				array(3, 12, 21, 30, 39, 48, 57, 66, 75),
				array(4, 13, 22, 31, 40, 49, 58, 67, 76),
				array(5, 14, 23, 32, 41, 50, 59, 68, 77),
				array(6, 15, 24, 33, 42, 51, 60, 69, 78),
				array(7, 16, 25, 34, 43, 52, 61, 70, 79),
				array(8, 17, 26, 35, 44, 53, 62, 71, 80)
			),
			3 => array(
				array(0, 1, 2, 9, 10, 11, 18, 19, 20), 
				array(3, 4, 5, 12, 13, 14, 21, 22, 23),
				array(6, 7, 8, 15, 16, 17, 24, 25, 26),
				array(27, 28, 29, 36, 37, 38, 45, 46, 47),
				array(30, 31, 32, 39, 40, 41, 48, 49, 50),
				array(33, 34, 35, 42, 43, 44, 51, 52, 53),
				array(54, 55, 56, 63, 64, 65, 72, 73, 74),
				array(57, 58, 59, 66, 67, 68, 75, 76, 77),
				array(60, 61, 62, 69, 70, 71, 78, 79, 80)
			)
		)
	);
	
    public function getValue($input) {
		$elements = explode(';', $input);

		$n = $elements[0];
		$content = explode(',', $elements[1]);

		for ($i = 1; $i <= 3; $i++) {
			foreach($this->_ranges[$n][$i] as $line) {
				$count = array();
				foreach($line as $item) {
					if (in_array($content[$item], $count)) {
						return 'False';
					}
					$count[] = $content[$item];
				}
			}
		}
		
		return 'True';
    }
}

$class = new sudoku();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
