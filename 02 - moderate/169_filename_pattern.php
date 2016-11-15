<?php

class filenamePattern {
    public function getValue($input) {		
		$elements = explode(' ', $input);
		$pattern = array_shift($elements);

		$pattern = str_replace('.', '\.', $pattern);
		$pattern = str_replace('-', '\-', $pattern);
		$pattern = str_replace('_', '\_', $pattern);

		preg_match_all('#\[(.*?)\]#', $pattern, $match);
		foreach($match[1] as $item) {
			$pattern = str_replace('['.$item.']', '('.implode('|',str_split($item)).')', $pattern);
		}

		$pattern = str_replace('*', '([0-9a-zA-Z_\.\-])*', $pattern);
		$pattern = str_replace('?', '([0-9a-zA-Z_\.\-]){1}', $pattern);
		$pattern = '/^'.$pattern.'$/';

		$output = array();
		foreach($elements as $item) {
			if (preg_match($pattern, $item)) {
				$output[] = $item;
			}
		}

		return (count($output)) ? implode(' ', $output) : '-';
    }
}

$class = new filenamePattern();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
