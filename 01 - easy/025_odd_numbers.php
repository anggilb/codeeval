<?php

class oddNumbers {
	public function getValue() {	
		$elements = array_filter(range(1, 99), function ($value) {
			return ($value % 2);
		});
		
		return implode(PHP_EOL, $elements);		
    }
}

$class = new oddNumbers();

echo $class->getValue();