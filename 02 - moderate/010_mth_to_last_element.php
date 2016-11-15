<?php

class mthToLastElement {
    public function getValue($input) {
        $elements = explode(' ', $input);

        $n = implode(array_splice($elements, (count($elements) - 1), 1));
        
        return (count($elements) >= $n) ? $elements[count($elements) - $n] : NULL;
    }
}

$class = new mthToLastElement();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
