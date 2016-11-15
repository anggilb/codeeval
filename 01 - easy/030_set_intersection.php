 <?php

class setIntersection {
    public function getValue($input) {
		$elements = explode(';', $input);
		
		$list_1 = explode(',', $elements[0]);
		$list_2 = explode(',', $elements[1]);
		
		return implode (',',array_intersect($list_1, $list_2));
    }
}

$class = new setIntersection();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}