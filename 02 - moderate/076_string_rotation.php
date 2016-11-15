<?php

class stringRotation {
	public function getValue($input) {
        $elements = explode(',', $input);
        $new = $elements[0];
        foreach(str_split($elements[0]) as $letter) {
            $new = substr($new, 1).$letter;
            if ($new == $elements[1]) {
                return 'True';
            }
        }
        
        return 'False';
	} 
}

$class = new stringRotation();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
