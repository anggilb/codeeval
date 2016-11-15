<?php

class reverseAndAdd {
    public function getValue($input) {
        $counter = 0;

        while ($input != strrev($input)) {
            $input = $input + strrev($input);
            $counter++;
        }

        return $counter." ".$input;
    }
}

$class = new reverseAndAdd();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
