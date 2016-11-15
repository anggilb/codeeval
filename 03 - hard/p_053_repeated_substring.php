<?php

class repeatedSubstring {
    public function getValue($input) {
        $count = strlen($input);
 
        for($i = ($count - 1); $i > 1; $i--) {
            for($j = 0; $j < ($count - $i + 1); $j++) {
                $substr= substr($input, $j, $i);
 
                $pos = strpos($input, $substr, 2);
                if ((false !== $pos) && ($pos >= $i + $j)) {
                    return $substr;
                }
            }
        }
 
        return 'NONE';
    }
}
 
$class = new repeatedSubstring();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
