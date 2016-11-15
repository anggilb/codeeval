 <?php

class mixedContent {
    public function getValue($input) {
		$elements = explode(',', $input);
		
		$list_1 = explode(',', $elements[0]);
		$list_2 = explode(',', $elements[1]);
		
		$digits = array();
		$words = array();
		foreach($elements as $item) {
			if (is_numeric($item)) {
				$digits[] = $item;
			} else {
				$words[] = $item;
			}
		}

		$words_string = implode (',',$words);
		$digits_string = implode(',',$digits);
		$separator = (count($digits) && count($words)) ? '|' : NULL;
		
		return $words_string.$separator.$digits_string;
    }
}

$class = new mixedContent();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}