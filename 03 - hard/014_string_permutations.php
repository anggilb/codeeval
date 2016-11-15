<?php
class stringPermutations {	
	public function getValue($input) {		
		$elements = str_split($input);
		sort($elements);
		
		$output = array();
		$this->_rec("", $elements, $output);

		return implode(',', $output);		
	}
	
	private function _rec($item, $input, &$output) {
	if (count($input) != 1) {
		$guide = $input;
		while (count($guide) != 0) {
			$content = $input;
			$node = array_shift($guide);

			$pos = array_search($node, $content);

			unset($content[$pos]);

			$value = $this->_rec($item.$node, $content, $output);
			if ($value) {
				$output[] = $value;
			}
		}
	} else {
		return $item.implode($input);
	} 
}
}
$class = new stringPermutations();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
