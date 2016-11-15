<?php

class predictTheNumber {
    public function getValue($input) {
        $bin = base_convert($input, 10, 2);

        $sum = 0;
        for($i = 0; $i < strlen($bin); $i++) {
            if($bin[$i] == "1") $sum++;
        }
            
        return ($sum % 3);
    }
}

$class = new predictTheNumber();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
