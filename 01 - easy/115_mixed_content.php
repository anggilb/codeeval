 <?php

class swapElements {
    public function getValue($input) {
		$elements = explode(' : ', $input);
		
		$list = explode(' ', $elements[0]);
		$content = explode(', ', $elements[1]);
		
		$changes = array();
		foreach($content as $item) {
			$changes[] = explode('-', $item);
		}
		
		
		
		foreach($changes as $change) {
			$temp = $list[$change[0]];
			$list[$change[0]] = $list[$change[1]];
			$list[$change[1]] = $temp;
		}
		
		return implode(' ', $list);
    }
}

$class = new swapElements();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}